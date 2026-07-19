<?php

namespace App\Http\Controllers;

use App\Algorithms\KMeans;
use App\Algorithms\KNN;
use App\Algorithms\ZScore;
use App\Models\Employee;
use App\Services\EmployeeMetricsService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    public function __construct(protected EmployeeMetricsService $metrics) {}

    protected function normalize(array $rows): array
    {
        if (empty($rows)) {
            return $rows;
        }
        $dims = count($rows[0]['features']);
        $min = array_fill(0, $dims, INF);
        $max = array_fill(0, $dims, -INF);

        foreach ($rows as $r) {
            foreach ($r['features'] as $j => $v) {
                $min[$j] = min($min[$j], $v);
                $max[$j] = max($max[$j], $v);
            }
        }

        foreach ($rows as &$r) {
            foreach ($r['features'] as $j => $v) {
                $range = $max[$j] - $min[$j];
                $r['features'][$j] = $range == 0 ? 0.0 : ($v - $min[$j]) / $range;
            }
        }

        return $rows;
    }

    /**
     * GET /reports/outliers?field=1&month=2026-07&threshold=3.0
     * field index: 0=attendance_rate, 1=avg_working_hours, 2=salary
     */
    public function outliers(Request $request): JsonResponse
    {
        $fieldIndex = (int) $request->query('field', 1);
        $threshold = (float) $request->query('threshold', 3.0);
        $month = $request->query('month');

        $rows = $this->metrics->buildFeatures($month);
        $values = array_map(fn($r) => $r['features'][$fieldIndex], $rows);

        $outliers = ZScore::detectOutliers($values, $threshold);

        $result = [];
        foreach ($outliers as $i => $data) {
            $result[] = [
                'id' => $rows[$i]['id'],
                'name' => $rows[$i]['name'],
                'value' => $data['value'],
                'z' => round($data['z'], 3),
            ];
        }

        return response()->json(['field_index' => $fieldIndex, 'threshold' => $threshold, 'outliers' => $result]);
    }

    /**
     * GET /reports/classify/{employee}?k=3&month=2026-07
     * Requires a `performance_label` column somewhere (not in your migrations yet — flag below).
     */
    public function classify(Request $request, Employee $employee): JsonResponse
    {
        $k = (int) $request->query('k', 3);
        $month = $request->query('month');

        $rows = $this->metrics->buildFeatures($month);

        $labels = Employee::query()->whereNotNull('performance_label')->pluck('performance_label', 'id');

        $target = null;
        $dataset = [];
        foreach ($rows as $r) {
            if ($r['id'] === $employee->id) {
                $target = $r['features'];
                continue;
            }
            if (isset($labels[$r['id']])) {
                $dataset[] = ['features' => $r['features'], 'label' => $labels[$r['id']]];
            }
        }

        $knn = new KNN();
        $knn->fit($dataset);
        $prediction = $target ? $knn->predict($target, $k) : null;

        return response()->json([
            'id' => $employee->id,
            'name' => $employee->name,
            'predicted_label' => $prediction,
            'k' => $k,
        ]);
    }

    /**
     * GET /reports/clusters?k=3&month=2026-07
     */
    public function clusters(Request $request): JsonResponse
    {
        $k = (int) $request->query('k', 3);
        $month = $request->query('month');

        $rows = $this->metrics->buildFeatures($month);
        if (empty($rows)) {
            return response()->json(['centroids' => [], 'clusters' => []]);
        }

        $k = min($k, count($rows));

        $normalized = $this->normalize($rows);
        $km = new KMeans();
        $result = $km->fit(array_column($normalized, 'features'), $k);

        $clusters = [];
        foreach ($result['labels'] as $i => $label) {
            $clusters[$label][] = [
                'id' => $rows[$i]['id'],
                'name' => $rows[$i]['name'],
            ];
        }

        return response()->json([
            'k' => $k,
            'centroids' => $result['centroids'],
            'clusters' => $clusters,
        ]);
    }
}
