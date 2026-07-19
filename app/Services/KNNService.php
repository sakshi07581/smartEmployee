<?php

namespace App\Services;

use App\Algorithms\KNN;
use App\Models\Employee;
use Exception;

class KNNService
{
    protected BaseMetricsService $metrics;

    public function __construct(?BaseMetricsService $metrics = null)
    {
        $this->metrics = $metrics ?? new BaseMetricsService();
    }

    /**
     * Build a dataset from employees using BaseMetricsService.
     * Each row: ['features' => [avg_daily_hours, attendance_count, avg_payable], 'label' => salary_class|null]
     */
    public function buildDatasetFromEmployees(array $employeeIds = null): array
    {
        $query = Employee::query();
        if ($employeeIds) {
            $query->whereIn('id', $employeeIds);
        }
        $employees = $query->get();

        $dataset = [];
        foreach ($employees as $e) {
            $m = $this->metrics->getEmployeeMetrics($e->id);
            $features = [
                isset($m['avg_daily_hours']) ? (float)$m['avg_daily_hours'] : 0.0,
                isset($m['attendance_count']) ? (float)$m['attendance_count'] : 0.0,
                isset($m['avg_payable']) && $m['avg_payable'] !== null ? (float)$m['avg_payable'] : 0.0,
            ];
            $label = null;
            if (method_exists($e, 'salaryStructure') && $e->salaryStructure) {
                $label = $e->salaryStructure->salary_class ?? null;
            }
            $dataset[] = ['features' => $features, 'label' => $label];
        }

        return $dataset;
    }

    protected function minMaxNormalizeDataset(array $dataset): array
    {
        if (empty($dataset)) {
            return ['dataset' => [], 'mins' => [], 'maxs' => []];
        }
        $k = count($dataset[0]['features']);
        $mins = array_fill(0, $k, INF);
        $maxs = array_fill(0, $k, -INF);
        foreach ($dataset as $row) {
            foreach ($row['features'] as $i => $v) {
                if ($v < $mins[$i]) {
                    $mins[$i] = $v;
                }
                if ($v > $maxs[$i]) {
                    $maxs[$i] = $v;
                }
            }
        }
        $normed = [];
        foreach ($dataset as $row) {
            $nf = [];
            foreach ($row['features'] as $i => $v) {
                $min = $mins[$i];
                $max = $maxs[$i];
                $nf[] = ($max - $min) == 0.0 ? 0.0 : (($v - $min) / ($max - $min));
            }
            $normed[] = ['features' => $nf, 'label' => $row['label']];
        }
        return ['dataset' => $normed, 'mins' => $mins, 'maxs' => $maxs];
    }

    protected function normalizeFeatures(array $features, array $mins, array $maxs): array
    {
        $nf = [];
        foreach ($features as $i => $v) {
            $min = $mins[$i] ?? 0.0;
            $max = $maxs[$i] ?? $min;
            $nf[] = ($max - $min) == 0.0 ? 0.0 : (($v - $min) / ($max - $min));
        }
        return $nf;
    }

    /**
     * Predict label for a new feature vector using provided dataset.
     * $dataset should be array of ['features'=>[], 'label'=>...]
     */
    public function predictFromDataset(array $dataset, array $features, int $k = 3, bool $normalize = true)
    {
        if (empty($dataset)) {
            throw new Exception('Dataset is empty');
        }

        if ($normalize) {
            $res = $this->minMaxNormalizeDataset($dataset);
            $dataset = $res['dataset'];
            $features = $this->normalizeFeatures($features, $res['mins'], $res['maxs']);
        }

        $knn = new KNN();
        $knn->fit($dataset);
        return $knn->predict($features, $k);
    }
}
