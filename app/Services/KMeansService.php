<?php

namespace App\Services;

use App\Algorithms\KMeans;
use App\Models\Employee;

class KMeansService
{
    protected BaseMetricsService $metrics;

    public function __construct(?BaseMetricsService $metrics = null)
    {
        $this->metrics = $metrics ?? new BaseMetricsService();
    }

    /**
     * Build feature matrix from employees (avg_daily_hours, attendance_count, avg_payable)
     */
    public function buildDatasetFromEmployees(array $employeeIds = null): array
    {
        $query = Employee::query();
        if ($employeeIds) {
            $query->whereIn('id', $employeeIds);
        }
        $employees = $query->get();

        $data = [];
        foreach ($employees as $e) {
            $m = $this->metrics->getEmployeeMetrics($e->id);
            $data[] = [
                isset($m['avg_daily_hours']) ? (float)$m['avg_daily_hours'] : 0.0,
                isset($m['attendance_count']) ? (float)$m['attendance_count'] : 0.0,
                isset($m['avg_payable']) && $m['avg_payable'] !== null ? (float)$m['avg_payable'] : 0.0,
            ];
        }

        return $data;
    }

    protected function minMaxNormalize(array $data): array
    {
        if (empty($data)) {
            return ['data' => [], 'mins' => [], 'maxs' => []];
        }
        $k = count($data[0]);
        $mins = array_fill(0, $k, INF);
        $maxs = array_fill(0, $k, -INF);
        foreach ($data as $row) {
            foreach ($row as $i => $v) {
                if ($v < $mins[$i]) {
                    $mins[$i] = $v;
                }
                if ($v > $maxs[$i]) {
                    $maxs[$i] = $v;
                }
            }
        }
        $norm = [];
        foreach ($data as $row) {
            $nr = [];
            foreach ($row as $i => $v) {
                $min = $mins[$i];
                $max = $maxs[$i];
                $nr[] = ($max - $min) == 0.0 ? 0.0 : (($v - $min) / ($max - $min));
            }
            $norm[] = $nr;
        }
        return ['data' => $norm, 'mins' => $mins, 'maxs' => $maxs];
    }

    protected function inertia(array $data, array $labels, array $centroids): float
    {
        $sum = 0.0;
        foreach ($labels as $i => $lab) {
            $pt = $data[$i];
            $c = $centroids[$lab];
            $d2 = 0.0;
            for ($j = 0; $j < count($pt); $j++) {
                $t = $pt[$j] - $c[$j];
                $d2 += $t * $t;
            }
            $sum += $d2;
        }
        return $sum;
    }

    /**
     * Fit KMeans on provided dataset (array of numeric vectors).
     * Returns centroids, labels, inertia, mins, maxs.
     */
    public function fitFromDataset(array $dataset, int $k = 3, int $maxIter = 100, int $nInit = 3): array
    {
        if (empty($dataset)) {
            return ['centroids' => [], 'labels' => [], 'inertia' => 0.0];
        }

        $best = null;
        $normRes = $this->minMaxNormalize($dataset);
        $data = $normRes['data'];

        for ($run = 0; $run < max(1, $nInit); $run++) {
            $kmeans = new KMeans();
            $res = $kmeans->fit($data, $k, $maxIter);
            $centroids = $res['centroids'];
            $labels = $res['labels'];
            $in = $this->inertia($data, $labels, $centroids);
            if ($best === null || $in < $best['inertia']) {
                $best = ['centroids' => $centroids, 'labels' => $labels, 'inertia' => $in];
            }
        }

        return array_merge($best, ['mins' => $normRes['mins'], 'maxs' => $normRes['maxs']]);
    }

    /**
     * Convenience: build dataset from employees and fit.
     */
    public function fitFromEmployees(array $employeeIds = null, int $k = 3, int $maxIter = 100, int $nInit = 3): array
    {
        $dataset = $this->buildDatasetFromEmployees($employeeIds);
        return $this->fitFromDataset($dataset, $k, $maxIter, $nInit);
    }
}
