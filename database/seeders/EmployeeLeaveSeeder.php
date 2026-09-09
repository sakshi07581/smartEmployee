<?php

namespace Database\Seeders;

use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EmployeeLeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Employees
        |--------------------------------------------------------------------------
        */

        $employees = [
            [
                'employee_id' => 'EMP001',
                'name' => 'Roshan Dhungana',
                'department_name' => 'IT',
                'designation_name' => 'Software Developer',
            ],
            [
                'employee_id' => 'EMP002',
                'name' => 'Sujan Karki',
                'department_name' => 'IT',
                'designation_name' => 'Senior Developer',
            ],
            [
                'employee_id' => 'EMP003',
                'name' => 'Suman Shrestha',
                'department_name' => 'Sales',
                'designation_name' => 'Sales Executive',
            ],
            [
                'employee_id' => 'EMP004',
                'name' => 'Bibek Gautam',
                'department_name' => 'HR',
                'designation_name' => 'HR Executive',
            ],
            [
                'employee_id' => 'EMP005',
                'name' => 'Prakash Adhikari',
                'department_name' => 'Finance',
                'designation_name' => 'Financial Analyst',
            ],
            [
                'employee_id' => 'EMP006',
                'name' => 'Nabin Poudel',
                'department_name' => 'Accounts',
                'designation_name' => 'Accountant',
            ],
            [
                'employee_id' => 'EMP007',
                'name' => 'Kiran Thapa',
                'department_name' => 'Marketing',
                'designation_name' => 'Content Creator',
            ],
            [
                'employee_id' => 'EMP008',
                'name' => 'Anisha Koirala',
                'department_name' => 'Customer Support',
                'designation_name' => 'Support Officer',
            ],
            [
                'employee_id' => 'EMP009',
                'name' => 'Sabina Rai',
                'department_name' => 'Administration',
                'designation_name' => 'Administrative Officer',
            ],
            [
                'employee_id' => 'EMP010',
                'name' => 'Ramesh KC',
                'department_name' => 'Operations',
                'designation_name' => 'Operations Officer',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Leave Type IDs
        |--------------------------------------------------------------------------
        |
        | Get the IDs from the database instead of assuming they are 1, 2, 3...
        |
        */

        $leaveTypes = LeaveType::pluck('id', 'leave_type_id');

        /*
        |--------------------------------------------------------------------------
        | Leave Data
        |--------------------------------------------------------------------------
        */

        $leaves = [

            // ---------------------------------------------------------
            // Roshan - IT
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP001',
                'leave_type' => 'Annual Leave',
                'from_date' => '2026-01-26',
                'to_date' => '2026-01-28',
                'description' => 'Personal vacation and family time.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP001',
                'leave_type' => 'Sick Leave',
                'from_date' => '2026-04-13',
                'to_date' => '2026-04-13',
                'description' => 'Medical rest due to fever.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP001',
                'leave_type' => 'Casual Leave',
                'from_date' => '2026-09-18',
                'to_date' => '2026-09-18',
                'description' => 'Personal appointment.',
                'status' => 'pending',
            ],

            // ---------------------------------------------------------
            // Sujan - IT
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP002',
                'leave_type' => 'Annual Leave',
                'from_date' => '2026-02-16',
                'to_date' => '2026-02-20',
                'description' => 'Family vacation.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP002',
                'leave_type' => 'Sick Leave',
                'from_date' => '2026-06-08',
                'to_date' => '2026-06-09',
                'description' => 'Sick leave due to seasonal illness.',
                'status' => 'approved',
            ],

            // ---------------------------------------------------------
            // Suman - Sales
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP003',
                'leave_type' => 'Casual Leave',
                'from_date' => '2026-01-12',
                'to_date' => '2026-01-13',
                'description' => 'Personal work at home.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP003',
                'leave_type' => 'Annual Leave',
                'from_date' => '2026-07-20',
                'to_date' => '2026-07-24',
                'description' => 'Planned family trip.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP003',
                'leave_type' => 'Casual Leave',
                'from_date' => '2026-09-21',
                'to_date' => '2026-09-22',
                'description' => 'Personal commitments.',
                'status' => 'pending',
            ],

            // ---------------------------------------------------------
            // Bibek - HR
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP004',
                'leave_type' => 'Sick Leave',
                'from_date' => '2026-03-05',
                'to_date' => '2026-03-06',
                'description' => 'Recovery from seasonal flu.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP004',
                'leave_type' => 'Casual Leave',
                'from_date' => '2026-05-18',
                'to_date' => '2026-05-18',
                'description' => 'Personal appointment.',
                'status' => 'approved',
            ],

            // ---------------------------------------------------------
            // Prakash - Finance
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP005',
                'leave_type' => 'Annual Leave',
                'from_date' => '2026-03-23',
                'to_date' => '2026-03-27',
                'description' => 'Family vacation.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP005',
                'leave_type' => 'Sick Leave',
                'from_date' => '2026-08-10',
                'to_date' => '2026-08-11',
                'description' => 'Medical rest advised by doctor.',
                'status' => 'approved',
            ],

            // ---------------------------------------------------------
            // Nabin - Accounts
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP006',
                'leave_type' => 'Casual Leave',
                'from_date' => '2026-02-05',
                'to_date' => '2026-02-05',
                'description' => 'Urgent personal work.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP006',
                'leave_type' => 'Annual Leave',
                'from_date' => '2026-06-15',
                'to_date' => '2026-06-19',
                'description' => 'Planned family holiday.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP006',
                'leave_type' => 'Casual Leave',
                'from_date' => '2026-08-24',
                'to_date' => '2026-08-25',
                'description' => 'Personal commitments.',
                'status' => 'rejected',
            ],

            // ---------------------------------------------------------
            // Kiran - Marketing
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP007',
                'leave_type' => 'Annual Leave',
                'from_date' => '2026-04-20',
                'to_date' => '2026-04-24',
                'description' => 'Personal vacation.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP007',
                'leave_type' => 'Sick Leave',
                'from_date' => '2026-07-06',
                'to_date' => '2026-07-07',
                'description' => 'Health-related rest.',
                'status' => 'approved',
            ],

            // ---------------------------------------------------------
            // Anisha - Customer Support
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP008',
                'leave_type' => 'Casual Leave',
                'from_date' => '2026-01-29',
                'to_date' => '2026-01-30',
                'description' => 'Personal work.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP008',
                'leave_type' => 'Annual Leave',
                'from_date' => '2026-08-17',
                'to_date' => '2026-08-21',
                'description' => 'Family vacation.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP008',
                'leave_type' => 'Sick Leave',
                'from_date' => '2026-09-07',
                'to_date' => '2026-09-08',
                'description' => 'Sick leave due to illness.',
                'status' => 'pending',
            ],

            // ---------------------------------------------------------
            // Sabina - Administration
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP009',
                'leave_type' => 'Annual Leave',
                'from_date' => '2026-05-04',
                'to_date' => '2026-05-08',
                'description' => 'Family trip.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP009',
                'leave_type' => 'Casual Leave',
                'from_date' => '2026-06-29',
                'to_date' => '2026-06-29',
                'description' => 'Personal appointment.',
                'status' => 'approved',
            ],

            // ---------------------------------------------------------
            // Ramesh - Operations
            // ---------------------------------------------------------

            [
                'employee_id' => 'EMP010',
                'leave_type' => 'Sick Leave',
                'from_date' => '2026-02-23',
                'to_date' => '2026-02-24',
                'description' => 'Medical rest.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP010',
                'leave_type' => 'Annual Leave',
                'from_date' => '2026-07-27',
                'to_date' => '2026-07-31',
                'description' => 'Planned vacation.',
                'status' => 'approved',
            ],
            [
                'employee_id' => 'EMP010',
                'leave_type' => 'Casual Leave',
                'from_date' => '2026-09-14',
                'to_date' => '2026-09-15',
                'description' => 'Personal commitments.',
                'status' => 'pending',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Insert Leaves
        |--------------------------------------------------------------------------
        */

        foreach ($leaves as $leave) {

            $employee = collect($employees)
                ->firstWhere('employee_id', $leave['employee_id']);

            $fromDate = Carbon::parse($leave['from_date']);
            $toDate = Carbon::parse($leave['to_date']);

            Leave::create([
                'employee_name' => $employee['name'],
                'department_name' => $employee['department_name'],
                'designation_name' => $employee['designation_name'],
                'employee_id' => $employee['employee_id'],
                'leave_type_id' => $leaveTypes[$leave['leave_type']],
                'from_date' => $leave['from_date'],
                'to_date' => $leave['to_date'],
                'total_days' => $fromDate->diffInDays($toDate) + 1,
                'description' => $leave['description'],
                'status' => $leave['status'],
            ]);
        }
    }
}

