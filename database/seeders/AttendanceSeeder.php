<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            ['employee_id' => 'EMP001', 'name' => 'Roshan Dhungana', 'department_name' => 'IT', 'designation_name' => 'Software Developer'],
            ['employee_id' => 'EMP002', 'name' => 'Sujan Karki', 'department_name' => 'IT', 'designation_name' => 'Senior Developer'],
            ['employee_id' => 'EMP003', 'name' => 'Suman Shrestha', 'department_name' => 'Sales', 'designation_name' => 'Sales Executive'],
            ['employee_id' => 'EMP004', 'name' => 'Bibek Gautam', 'department_name' => 'HR', 'designation_name' => 'HR Executive'],
            ['employee_id' => 'EMP005', 'name' => 'Prakash Adhikari', 'department_name' => 'Finance', 'designation_name' => 'Financial Analyst'],
            ['employee_id' => 'EMP006', 'name' => 'Nabin Poudel', 'department_name' => 'Accounts', 'designation_name' => 'Accountant'],
            ['employee_id' => 'EMP007', 'name' => 'Kiran Thapa', 'department_name' => 'Marketing', 'designation_name' => 'Content Creator'],
            ['employee_id' => 'EMP008', 'name' => 'Anisha Koirala', 'department_name' => 'Customer Support', 'designation_name' => 'Support Officer'],
            ['employee_id' => 'EMP009', 'name' => 'Sabina Rai', 'department_name' => 'Administration', 'designation_name' => 'Administrative Officer'],
            ['employee_id' => 'EMP010', 'name' => 'Ramesh KC', 'department_name' => 'Operations', 'designation_name' => 'Operations Officer'],
        ];

        $months = [
            ['month' => 'May', 'date' => '2026-05-15'],
            ['month' => 'June', 'date' => '2026-06-15'],
            ['month' => 'July', 'date' => '2026-07-15'],
        ];

        foreach ($months as $m) {
            foreach ($employees as $employee) {

                $checkInHour = rand(8, 9);
                $checkInMinute = rand(0, 45);

                $duration = rand(450, 570); // 7.5 to 9.5 hours

                // Create one obvious outlier
                if ($employee['employee_id'] === 'EMP006' && $m['month'] === 'July') {
                    $duration = 120;
                }

                $checkIn = sprintf('%02d:%02d:00', $checkInHour, $checkInMinute);

                $checkOut = date(
                    'H:i:s',
                    strtotime($checkIn) + ($duration * 60)
                );

                Attendance::create([
                    'name' => $employee['name'],
                    'department_name' => $employee['department_name'],
                    'designation_name' => $employee['designation_name'],
                    'employee_id' => $employee['employee_id'],
                    'select_date' => $m['date'],
                    'month' => $m['month'],
                    'check_in' => $checkIn,
                    'late' => $checkIn > '09:00:00' ? 'Yes' : 'No',
                    'check_out' => $checkOut,
                    'overtime' => $duration > 480 ? 'Yes' : 'No',
                    'duration_minutes' => $duration,
                ]);
            }
        }
    }
}
