<?php

namespace App\Services;

use App\Algorithms\ZScore;

class ZScoreService
{
    public static function detectEmployees(
        array $rows,
        int $fieldIndex,
        float $threshold = 3.0
    ): array {

        $values = array_column(
            array_map(fn ($row) => $row['features'], $rows),
            $fieldIndex
        );

        $outliers = ZScore::detectOutliers($values, $threshold);

        $result = [];

        foreach ($outliers as $index => $item) {

            $result[] = [
                'id' => $rows[$index]['id'],
                'name' => $rows[$index]['name'],
                'value' => $item['value'],
                'z' => round($item['z'], 3),
            ];
        }

        return $result;
    }
}
