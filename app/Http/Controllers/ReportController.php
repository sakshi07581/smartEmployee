<?php

namespace App\Http\Controllers;

use App\Algorithms\KMeans;
use App\Algorithms\KNN;
use App\Algorithms\ZScore;
use App\Models\Employee;
use App\Services\EmployeeMetricsService;
use App\Services\KMeansService;
use App\Services\KNNService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
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

public function outliers(Request $request): View
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

    return view('admin.pages.Reports.outliers', [
        'field index' => $fieldIndex,
        'threshold' => $threshold,
        'outliers' => $result
    ]);
}


    /**
     * GET /reports/classify/{employee}?k=3&month=2026-07
     * Requires a `performance_label` column somewhere (not in your migrations yet — flag below).
     */
    public function classifications()
{
    return view('admin.pages.Reports.classifications', [
        'employees' => Employee::orderBy('name')->get()
    ]);
}
    public function classify(
    Request $request,
    Employee $employee,
    KNNService $knnService
): View {

    $month = $request->query('month');
    $k = (int) $request->query('k', 3);

    $rows = $this->metrics->buildFeatures($month);

    $labels = Employee::pluck('salary_structure_id', 'id');

    $dataset = [];
    $target = null;

    foreach ($rows as $row) {

        $features = array_values($row['features']);

        if ($row['id'] == $employee->id) {
            $target = $features;
            continue;
        }

        if (!empty($labels[$row['id']])) {

            $dataset[] = [
                'features' => $features,
                'label' => $labels[$row['id']],
            ];
        }
    }

    $prediction = $knnService->predict(
        $dataset,
        $target,
        $k
    );

   return view('admin.pages.Reports.classifications', [
    'id' => $employee->id,
    'name' => $employee->name,
    'predicted_label' => $prediction,
    'k' => $k,
]);
}

    /**
     * GET /reports/clusters?k=3&month=2026-07
     */
   public function clusters(
    Request $request,
    KMeansService $kMeansService
): View {

    $month = $request->query('month');
    $k = (int) $request->query('k', 3);

    $rows = $this->metrics->buildFeatures($month);

    // if (empty($rows)) {
    //     return response()->json([
    //         'k' => 0,
    //         'centroids' => [],
    //         'clusters' => [],
    //     ]);
    // }

    $dataset = array_map(function ($row) {
        return array_values($row['features']);
    }, $rows);

    $k = min($k, count($dataset));

    $result = $kMeansService->fitFromDataset($dataset, $k);

    $clusters = [];

    foreach ($result['labels'] as $index => $cluster) {

        $clusters[$cluster][] = [
            'id' => $rows[$index]['id'],
            'name' => $rows[$index]['name'],
            'features' => $rows[$index]['features'],
        ];
    }

   return view('admin.pages.Reports.clusters', [
    'k' => $k,
    'inertia' => round($result['inertia'], 2),
    'centroids' => $result['centroids'],
    'clusters' => $clusters,
]);
}
}
