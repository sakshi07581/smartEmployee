<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaveTypes = [
            [
                'leave_type_id' => 'Annual Leave',
                'leave_days' => 18,
            ],
            [
                'leave_type_id' => 'Sick Leave',
                'leave_days' => 12,
            ],
            [
                'leave_type_id' => 'Casual Leave',
                'leave_days' => 12,
            ],
            [
                'leave_type_id' => 'Maternity Leave',
                'leave_days' => 98,
            ],
            [
                'leave_type_id' => 'Paternity Leave',
                'leave_days' => 15,
            ],
        ];

        foreach ($leaveTypes as $leaveType) {
            LeaveType::create($leaveType);
        }
    }
}
