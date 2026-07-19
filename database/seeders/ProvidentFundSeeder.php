<?php

namespace Database\Seeders;

use App\Models\Payroll;
use App\Models\ProvidentFund;
use Illuminate\Database\Seeder;

class ProvidentFundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payrolls = Payroll::all();

        foreach ($payrolls as $payroll) {
            ProvidentFund::create([
                'employee_id' => $payroll->employee_id,
                'payroll_id' => $payroll->id,
                'provident_fund_amount' => round($payroll->total_payable * 0.10, 2),
            ]);
        }
    }
}
