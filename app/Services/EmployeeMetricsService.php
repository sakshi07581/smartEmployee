<?php

namespace App\Services;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EmployeeMetricsService
{
    /**
     * Build [attendance_rate, avg_working_hours, salary] for every employee
     * for a given month (format: 'Y-m', defaults to current month).
     */
    public function buildFeatures(?string $month = null): array
    {
        $month = $month ?? Carbon::now()->format('Y-m');
        $start = Carbon::parse($month . '-01');
        $end = $start->copy()->endOfMonth();
        $workingDays = $this->workingDaysInRange($start, $end);

        $employees = Employee::query()->select('id', 'name', 'employee_id', 'salary_structure_id')->get();

        // attendance counts + avg duration per employee_id (string) for the month
        $attendanceStats = DB::table('attendances')
            ->select('employee_id')
            ->selectRaw('COUNT(DISTINCT select_date) as present_days')
            ->selectRaw('AVG(duration_minutes) as avg_minutes')
            ->where('select_date', '>=', $start->toDateString())
            ->where('select_date', '<=', $end->toDateString())
            ->groupBy('employee_id')
            ->get()
            ->keyBy('employee_id');

        // salary lookup — adjust table/column to match your salary_structures schema
        $salaries = DB::table('salary_structures')->pluck('basic_salary', 'id');

        $rows = [];
        foreach ($employees as $emp) {
            $stat = $attendanceStats->get($emp->employee_id);
            $presentDays = $stat->present_days ?? 0;
            $avgMinutes = $stat->avg_minutes ?? 0;

            $rows[] = [
                'id' => $emp->id,
                'name' => $emp->name,
                'features' => [
                    $workingDays > 0 ? round(($presentDays / $workingDays) * 100, 2) : 0.0, // attendance_rate %
                    round($avgMinutes / 60, 2),                                             // avg_working_hours
                    (float) ($salaries[$emp->salary_structure_id] ?? 0),                    // salary
                ],
            ];
        }

        return $rows;
    }

    protected function workingDaysInRange(Carbon $start, Carbon $end): int
    {
        $days = 0;
        $cursor = $start->copy();
        while ($cursor->lte($end)) {
            if (! $cursor->isWeekend()) {
                $days++;
            }
            $cursor->addDay();
        }
        return $days;
    }
}
