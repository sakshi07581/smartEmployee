<?php

namespace Tests\Unit;

use App\Services\KNNService;
use PHPUnit\Framework\TestCase;

class KNNServiceTest extends TestCase
{
    public function test_predict_from_override_dataset()
    {
        $service = new KNNService();

        $dataset = [
            ['features' => [1.0, 10, 1000], 'label' => 'High'],
            ['features' => [0.5, 8, 800], 'label' => 'Average'],
            ['features' => [0.2, 5, 400], 'label' => 'Low'],
            ['features' => [0.9, 9, 1200], 'label' => 'High'],
        ];

        $prediction = $service->predictFromDataset($dataset, [0.85, 9, 1100], 3, true);
        $this->assertEquals('High', $prediction);
    }
}
