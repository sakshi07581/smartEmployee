<?php

namespace App\Http\Controllers;

use App\Algorithms\KMeans;
use App\Algorithms\KNN;
use App\Algorithms\ZScore;
use App\Models\Employee;
use App\Services\EmployeeMetricsService;
use App\Services\KMeansService;
use App\Services\KNNService;
use App\Services\ZScoreService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;

class ReportController extends Controller
{
    public function __construct(protected EmployeeMetricsService $metrics) {}



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


        $rows = $this->metrics->buildFeatures($month);

        $result = ZScoreService::detectEmployees(
            $rows,
            $fieldIndex,
            $threshold
        );

        return view('admin.pages.Reports.outliers', [
            'fieldIndex' => $fieldIndex,
            'threshold' => $threshold,
            'month' => $month,
            'outliers' => $result,
        ]);
    }


    /**
     * GET /reports/classify/{employee}?k=3&month=2026-07
     * Requires a `performance_label` column somewhere (not in your migrations yet — flag below).
     */
    public function classifications(
        Request $request,
        KNNService $knnService
    ): View {
        $employees = Employee::orderBy('name')->get();

        $employee = null;
        $predictedLabel = null;
        $k = (int) $request->query('k', 3);

        if ($request->filled('employee')) {
            $employee = Employee::findOrFail($request->employee);

            $predictedLabel = $knnService->classify(
                $employee,
                $request->query('month'),
                $k
            );
        }

        return view('admin.pages.Reports.classifications', [
            'employees' => $employees,
            'employee' => $employee,
            'predicted_label' => $predictedLabel,
            'k' => $k,
        ]);
    }
    public function classify(
        Request $request,
        Employee $employee,
        KNNService $knnService
    ): View {


        $prediction = $knnService->classify(
            $employee,
            $request->query('month'),
            (int) $request->query('k', 3)
        );
        return view('admin.pages.Reports.classifications', [
            'employee' => $employee,
            'employees' => Employee::orderBy('name')->get(),
            'predicted_label' => $prediction,
            'k' => (int) $request->query('k', 3),
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
    private function employees()
    {
        return Employee::orderBy('name')->get();
    }
}
