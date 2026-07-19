<?php

namespace App\Services;

use App\Algorithms\ZScore;

class ZScoreService
{
    /**
     * Detect outliers from any numeric dataset.
     *
     * @param array $values Numeric values to analyze.
     * @param array|null $keys Optional identifiers corresponding to each value.
     * @param float $threshold Z-score threshold.
     *
     * @return array
     */
    public function detect(array $values, ?array $keys = null, float $threshold = 3.0): array
    {
        if (empty($values)) {
            return [];
        }

        $keys ??= array_keys($values);
        $values = array_map('floatval', array_values($values));

        $outliers = ZScore::detectOutliers($values, $threshold);

        $result = [];

        foreach ($outliers as $index => $outlier) {
            $result[] = [
                'key' => $keys[$index] ?? $index,
                'index' => $index,
                'value' => $outlier['value'],
                'z' => round($outlier['z'], 3),
            ];
        }

        return $result;
    }
}
