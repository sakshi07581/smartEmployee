<?php

namespace Database\Seeders;

use App\Models\SalaryStructure;
use Illuminate\Database\Seeder;

class SalaryStructureSeeder extends Seeder
{
    public function run(): void
    {
        $structures = [
            [
                'salary_class' => 'Grade A',
                'basic_salary' => 100000,
                'mobile_allowance' => 5000,
                'medical_expenses' => 5000,
                'houseRent_allowance' => 20000,
                'total_salary' => 130000,
            ],
            [
                'salary_class' => 'Grade B',
                'basic_salary' => 70000,
                'mobile_allowance' => 3000,
                'medical_expenses' => 3000,
                'houseRent_allowance' => 15000,
                'total_salary' => 91000,
            ],
            [
                'salary_class' => 'Grade C',
                'basic_salary' => 50000,
                'mobile_allowance' => 2000,
                'medical_expenses' => 2000,
                'houseRent_allowance' => 10000,
                'total_salary' => 64000,
            ],
            [
                'salary_class' => 'Grade D',
                'basic_salary' => 35000,
                'mobile_allowance' => 1500,
                'medical_expenses' => 1500,
                'houseRent_allowance' => 7000,
                'total_salary' => 45000,
            ],
            [
                'salary_class' => 'Grade E',
                'basic_salary' => 25000,
                'mobile_allowance' => 1000,
                'medical_expenses' => 1000,
                'houseRent_allowance' => 5000,
                'total_salary' => 32000,
            ],
        ];

        foreach ($structures as $structure) {
            SalaryStructure::create($structure);
        }
    }
}
