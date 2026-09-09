<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        if ($employees->isEmpty()) {
            $this->command->error('No employees found. Run EmployeeSeeder first.');
            return;
        }

        $taskTemplates = [
            'Prepare monthly report',
            'Update employee records',
            'Complete project documentation',
            'Client communication and follow-up',
            'Prepare project proposal',
            'Database maintenance',
            'System testing',
            'Prepare presentation',
            'Data entry and verification',
            'Attend team meeting',
            'Prepare weekly progress report',
            'Review project requirements',
            'Update project documentation',
            'Perform quality assurance',
            'Conduct employee training',
            'Analyze performance data',
            'Prepare financial summary',
            'Resolve pending issues',
            'Coordinate with team members',
            'Research and development',
            'Update system records',
            'Prepare management report',
            'Review submitted documents',
            'Complete assigned project module',
        ];

        $descriptions = [
            'Complete the assigned task and submit the required output.',
            'Review the existing information and update it with the latest data.',
            'Coordinate with the concerned team members and complete the assignment.',
            'Prepare the required documentation and submit it for review.',
            'Analyze the available information and prepare a suitable report.',
            'Complete the assigned work within the given deadline.',
        ];

        $statuses = [
            'pending',
            'in_progress',
            'completed',
        ];

        foreach ($employees as $employee) {

            /*
             * Different employees get different workloads.
             * This creates more realistic data for analytics.
             */
            $taskCount = match ($employee->employee_id) {
                'EMP006' => rand(8, 11),
                'EMP015' => rand(7, 10),
                'EMP017' => rand(9, 12),
                'EMP001', 'EMP002', 'EMP003' => rand(12, 16),
                default => rand(10, 14),
            };

            for ($i = 0; $i < $taskCount; $i++) {

                /*
                 * Random task start date between
                 * January 1 and September 15, 2026.
                 */
                $fromDate = Carbon::create(
                    2026,
                    rand(1, 9),
                    1
                )->addDays(rand(0, 20));

                /*
                 * Most tasks take between 1 and 7 days.
                 */
                $totalDays = rand(1, 7);

                $toDate = $fromDate->copy()->addDays($totalDays - 1);

                /*
                 * Keep tasks inside our Jan-Sep dataset period.
                 */
                if ($toDate->greaterThan(Carbon::create(2026, 9, 30))) {
                    $toDate = Carbon::create(2026, 9, 30);

                    $totalDays = $fromDate->diffInDays($toDate) + 1;
                }

                /*
                 * Employee performance differences.
                 *
                 * EMP006 and EMP015 have slightly more
                 * pending/in-progress tasks so they can
                 * be useful in performance analysis.
                 */
                if (in_array($employee->employee_id, ['EMP006', 'EMP015'])) {

                    $status = collect([
                        'pending',
                        'pending',
                        'in_progress',
                        'in_progress',
                        'completed',
                        'completed',
                    ])->random();

                } else {

                    $status = collect([
                        'completed',
                        'completed',
                        'completed',
                        'in_progress',
                        'pending',
                    ])->random();
                }

                Task::create([
                    'employee_id' => $employee->id,

                    'task_name' => $taskTemplates[array_rand($taskTemplates)]
                        . ' - ' . ($i + 1),

                    'from_date' => $fromDate->format('Y-m-d'),

                    'to_date' => $toDate->format('Y-m-d'),

                    'total_days' => $totalDays,

                    'task_description' => $descriptions[array_rand($descriptions)],

                    'status' => $status,
                ]);
            }
        }

        $this->command->info(
            'TaskSeeder completed successfully for ' .
            $employees->count() .
            ' employees.'
        );
    }
}
