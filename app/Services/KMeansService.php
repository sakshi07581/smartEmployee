<?php

namespace App\Services;

use App\Algorithms\KMeans;

class KMeansService
{
    protected function minMaxNormalize(array $data): array
    {
        if (empty($data)) {
            return [
                'data' => [],
                'mins' => [],
                'maxs' => [],
            ];
        }

        $dimensions = count($data[0]);

        $mins = array_fill(0, $dimensions, INF);
        $maxs = array_fill(0, $dimensions, -INF);

        foreach ($data as $row) {
            foreach ($row as $i => $value) {
                $mins[$i] = min($mins[$i], $value);
                $maxs[$i] = max($maxs[$i], $value);
            }
        }

        foreach ($data as &$row) {
            foreach ($row as $i => $value) {
                $range = $maxs[$i] - $mins[$i];

                $row[$i] = $range == 0
                    ? 0
                    : ($value - $mins[$i]) / $range;
            }
        }

        return [
            'data' => $data,
            'mins' => $mins,
            'maxs' => $maxs,
        ];
    }

    protected function inertia(array $data, array $labels, array $centroids): float
    {
        $sum = 0;

        foreach ($labels as $i => $cluster) {

            $distance = 0;

            foreach ($data[$i] as $j => $value) {

                $diff = $value - $centroids[$cluster][$j];
                $distance += $diff * $diff;
            }

            $sum += $distance;
        }

        return $sum;
    }

    public function fitFromDataset(
        array $dataset,
        int $k = 3,
        int $maxIter = 100,
        int $nInit = 3
    ): array {

        if (empty($dataset)) {
            return [
                'centroids' => [],
                'labels' => [],
                'inertia' => 0,
            ];
        }

        $normalized = $this->minMaxNormalize($dataset);

        $data = $normalized['data'];

        $best = null;

        for ($i = 0; $i < $nInit; $i++) {

            $kmeans = new KMeans();

            $result = $kmeans->fit($data, $k, $maxIter);

            $score = $this->inertia(
                $data,
                $result['labels'],
                $result['centroids']
            );

            if ($best == null || $score < $best['inertia']) {

                $best = [
                    'centroids' => $result['centroids'],
                    'labels' => $result['labels'],
                    'inertia' => $score,
                ];
            }
        }

        return array_merge($best, [
            'mins' => $normalized['mins'],
            'maxs' => $normalized['maxs'],
        ]);
    }
}
