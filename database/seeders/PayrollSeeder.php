<?php

namespace Database\Seeders;

use App\Models\Payroll;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $months = [
            ['month' => 'May',  'date' => '2026-05-31'],
            ['month' => 'June', 'date' => '2026-06-30'],
            ['month' => 'July', 'date' => '2026-07-31'],
        ];

        // employee_id => [salary_structure_id, total_salary]
        $employees = [
            1  => [3, 64000],
            2  => [2, 91000],
            3  => [3, 64000],
            4  => [2, 91000],
            5  => [2, 91000],
            6  => [3, 64000],
            7  => [3, 64000],
            8  => [4, 45000],
            9  => [4, 45000],
            10 => [3, 64000],
        ];

        foreach ($months as $month) {
            foreach ($employees as $employeeId => [$salaryStructureId, $salary]) {

                $deduction = match (rand(1, 5)) {
                    1 => 0,
                    2 => 500,
                    3 => 1000,
                    4 => 1500,
                    default => 2000,
                };

                Payroll::create([
                    'employee_id'         => $employeeId,
                    'salary_structure_id' => $salaryStructureId,
                    'deduction'           => $deduction,
                    'total_payable'       => $salary - $deduction,
                    'reason'              => $deduction == 0 ? null : 'Attendance Deduction',
                    'year'                => '2026',
                    'month'               => $month['month'],
                    'date'                => $month['date'],
                ]);
            }
        }
    }
}
