<?php

namespace Tests\Unit;

use App\Services\KMeansService;
use PHPUnit\Framework\TestCase;

class KMeansServiceTest extends TestCase
{
    public function test_fit_from_dataset_three_clusters()
    {
        $service = new KMeansService();

        // three compact clusters in 2D+third dim
        $cluster1 = [[0, 0, 0], [0.1, 0.2, 0], [0.2, -0.1, 0]];
        $cluster2 = [[5, 5, 100], [5.1, 4.9, 110], [4.9, 5.2, 105]];
        $cluster3 = [[10, 0, 200], [10.2, 0.1, 210], [9.8, -0.2, 190]];
        $data = array_merge($cluster1, $cluster2, $cluster3);

        $res = $service->fitFromDataset($data, 3, 100, 3);

        $this->assertCount(3, $res['centroids']);
        $this->assertCount(count($data), $res['labels']);
        $this->assertIsFloat($res['inertia']);
    }
}
