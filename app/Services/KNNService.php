<?php

namespace App\Services;

use App\Algorithms\KNN;
use App\Models\Employee;

class KNNService
{
    protected EmployeeMetricsService $metrics;

public function __construct(EmployeeMetricsService $metrics)
{
    $this->metrics = $metrics;
}
public function classify(
    Employee $employee,
    ?string $month = null,
    int $k = 3
) {

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

        if (isset($labels[$row['id']])) {

            $dataset[] = [
                'features' => $features,
                'label' => $labels[$row['id']],
            ];
        }
    }

    if ($target === null) {
        return null;
    }

    return $this->predict($dataset, $target, $k);
}
    /**
     * Normalize dataset using Min-Max scaling.
     */
    protected function normalize(array $dataset): array
    {
        if (empty($dataset)) {
            return [
                'dataset' => [],
                'mins' => [],
                'maxs' => [],
            ];
        }

        $dimensions = count($dataset[0]['features']);

        $mins = array_fill(0, $dimensions, INF);
        $maxs = array_fill(0, $dimensions, -INF);

        foreach ($dataset as $row) {
            foreach ($row['features'] as $i => $value) {
                $mins[$i] = min($mins[$i], $value);
                $maxs[$i] = max($maxs[$i], $value);
            }
        }

        foreach ($dataset as &$row) {
            foreach ($row['features'] as $i => $value) {
                $range = $maxs[$i] - $mins[$i];
                $row['features'][$i] = $range == 0
                    ? 0
                    : ($value - $mins[$i]) / $range;
            }
        }

        return [
            'dataset' => $dataset,
            'mins' => $mins,
            'maxs' => $maxs,
        ];
    }

    protected function normalizeFeatures(array $features, array $mins, array $maxs): array
    {
        foreach ($features as $i => $value) {
            $range = $maxs[$i] - $mins[$i];

            $features[$i] = $range == 0
                ? 0
                : ($value - $mins[$i]) / $range;
        }

        return $features;
    }

    public function predict(array $dataset, array $target, int $k = 3)
    {
        $normalized = $this->normalize($dataset);

        $dataset = $normalized['dataset'];

        $target = $this->normalizeFeatures(
            $target,
            $normalized['mins'],
            $normalized['maxs']
        );

        $knn = new KNN();

        $knn->fit($dataset);

        return $knn->predict($target, $k);
    }
}
