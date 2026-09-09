<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
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

            [
                'employee_id' => 'EMP011',
                'name' => 'Milan Bhandari',
                'department_name' => 'IT',
                'designation_name' => 'Backend Developer',
            ],

            [
                'employee_id' => 'EMP012',
                'name' => 'Aayusha Sharma',
                'department_name' => 'Marketing',
                'designation_name' => 'Marketing Officer',
            ],

            [
                'employee_id' => 'EMP013',
                'name' => 'Dipesh Neupane',
                'department_name' => 'Development',
                'designation_name' => 'Junior Developer',
            ],

            [
                'employee_id' => 'EMP014',
                'name' => 'Sarita Tamang',
                'department_name' => 'Management',
                'designation_name' => 'Project Coordinator',
            ],

            [
                'employee_id' => 'EMP015',
                'name' => 'Bikash Oli',
                'department_name' => 'Operations',
                'designation_name' => 'Operations Assistant',
            ],

            [
                'employee_id' => 'EMP016',
                'name' => 'Saraswati Gurung',
                'department_name' => 'Development',
                'designation_name' => 'Frontend Developer',
            ],

            [
                'employee_id' => 'EMP017',
                'name' => 'Ashish Regmi',
                'department_name' => 'Sales',
                'designation_name' => 'Sales Officer',
            ],

            [
                'employee_id' => 'EMP018',
                'name' => 'Rojina Lama',
                'department_name' => 'Administration',
                'designation_name' => 'Office Administrator',
            ],

            [
                'employee_id' => 'EMP019',
                'name' => 'Hari Prasad Nepal',
                'department_name' => 'Finance',
                'designation_name' => 'Finance Officer',
            ],

            [
                'employee_id' => 'EMP020',
                'name' => 'Puja Acharya',
                'department_name' => 'Finance',
                'designation_name' => 'Account Assistant',
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | Employee Attendance Profiles
        |--------------------------------------------------------------------------
        |
        | These profiles make the generated data more meaningful.
        |
        | attendance:
        | Approximate probability of attending work.
        |
        | late:
        | Probability of arriving late.
        |
        | overtime:
        | Probability of working more than 8 hours.
        |
        */

        $profiles = [

            'EMP001' => [
                'attendance' => 0.96,
                'late' => 0.08,
                'overtime' => 0.45,
            ],

            'EMP002' => [
                'attendance' => 0.98,
                'late' => 0.04,
                'overtime' => 0.60,
            ],

            'EMP003' => [
                'attendance' => 0.91,
                'late' => 0.15,
                'overtime' => 0.20,
            ],

            'EMP004' => [
                'attendance' => 0.94,
                'late' => 0.10,
                'overtime' => 0.25,
            ],

            'EMP005' => [
                'attendance' => 0.97,
                'late' => 0.06,
                'overtime' => 0.50,
            ],

            /*
            |--------------------------------------------------------------------------
            | Nabin deliberately has weaker attendance.
            | Useful for clustering / anomaly analysis.
            |--------------------------------------------------------------------------
            */

            'EMP006' => [
                'attendance' => 0.82,
                'late' => 0.25,
                'overtime' => 0.08,
            ],

            'EMP007' => [
                'attendance' => 0.90,
                'late' => 0.18,
                'overtime' => 0.15,
            ],

            'EMP008' => [
                'attendance' => 0.88,
                'late' => 0.20,
                'overtime' => 0.30,
            ],

            'EMP009' => [
                'attendance' => 0.95,
                'late' => 0.08,
                'overtime' => 0.25,
            ],

            'EMP010' => [
                'attendance' => 0.92,
                'late' => 0.13,
                'overtime' => 0.35,
            ],

            'EMP011' => [
                'attendance' => 0.97,
                'late' => 0.05,
                'overtime' => 0.55,
            ],

            'EMP012' => [
                'attendance' => 0.89,
                'late' => 0.17,
                'overtime' => 0.18,
            ],

            'EMP013' => [
                'attendance' => 0.93,
                'late' => 0.11,
                'overtime' => 0.30,
            ],

            'EMP014' => [
                'attendance' => 0.96,
                'late' => 0.06,
                'overtime' => 0.45,
            ],

            'EMP015' => [
                'attendance' => 0.84,
                'late' => 0.24,
                'overtime' => 0.10,
            ],

            'EMP016' => [
                'attendance' => 0.94,
                'late' => 0.09,
                'overtime' => 0.35,
            ],

            'EMP017' => [
                'attendance' => 0.87,
                'late' => 0.19,
                'overtime' => 0.20,
            ],

            'EMP018' => [
                'attendance' => 0.95,
                'late' => 0.07,
                'overtime' => 0.25,
            ],

            'EMP019' => [
                'attendance' => 0.96,
                'late' => 0.06,
                'overtime' => 0.40,
            ],

            'EMP020' => [
                'attendance' => 0.92,
                'late' => 0.14,
                'overtime' => 0.25,
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | January → September 2026
        |--------------------------------------------------------------------------
        */

        $startDate = Carbon::create(2026, 1, 1);
        $endDate = Carbon::create(2026, 9, 30);


        /*
        |--------------------------------------------------------------------------
        | Generate Daily Attendance
        |--------------------------------------------------------------------------
        */

        foreach ($employees as $employee) {

            $date = $startDate->copy();

            while ($date->lte($endDate)) {

                /*
                |--------------------------------------------------------------------------
                | Skip Saturday and Sunday
                |--------------------------------------------------------------------------
                */

                if ($date->isWeekend()) {

                    $date->addDay();

                    continue;
                }


                $profile = $profiles[$employee['employee_id']];


                /*
                |--------------------------------------------------------------------------
                | Determine Attendance
                |--------------------------------------------------------------------------
                */

                $isPresent =
                    mt_rand(1, 10000) <=
                    ($profile['attendance'] * 10000);


                /*
                |--------------------------------------------------------------------------
                | If absent, create an attendance record with zero duration.
                |--------------------------------------------------------------------------
                |
                | If your application instead uses no record for absent employees,
                | remove this block and simply skip the day.
                |
                */

                if (!$isPresent) {

                    Attendance::create([

                        'name' =>
                            $employee['name'],

                        'department_name' =>
                            $employee['department_name'],

                        'designation_name' =>
                            $employee['designation_name'],

                        'employee_id' =>
                            $employee['employee_id'],

                        'select_date' =>
                            $date->format('Y-m-d'),

                        'month' =>
                            $date->format('F'),

                        'check_in' =>
                            null,

                        'late' =>
                            'No',

                        'check_out' =>
                            null,

                        'overtime' =>
                            'No',

                        'duration_minutes' =>
                            0,

                    ]);


                    $date->addDay();

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | Check-in Time
                |--------------------------------------------------------------------------
                */

                $isLate =
                    mt_rand(1, 10000) <=
                    ($profile['late'] * 10000);


                if ($isLate) {

                    $checkInHour = rand(9, 10);

                    if ($checkInHour === 9) {
                        $checkInMinute = rand(5, 59);
                    } else {
                        $checkInMinute = rand(0, 20);
                    }

                } else {

                    $checkInHour = 8;

                    $checkInMinute = rand(30, 59);

                }


                $checkIn = sprintf(
                    '%02d:%02d:00',
                    $checkInHour,
                    $checkInMinute
                );


                /*
                |--------------------------------------------------------------------------
                | Working Duration
                |--------------------------------------------------------------------------
                */

                $isOvertime =
                    mt_rand(1, 10000) <=
                    ($profile['overtime'] * 10000);


                if ($isOvertime) {

                    $duration = rand(510, 600);

                } else {

                    $duration = rand(450, 500);

                }


                /*
                |--------------------------------------------------------------------------
                | Deliberate anomaly for Nabin
                |--------------------------------------------------------------------------
                |
                | Creates several abnormal working days throughout the year
                | rather than only one isolated record.
                |
                */

                if (
                    $employee['employee_id'] === 'EMP006'
                    && in_array(
                        $date->format('Y-m-d'),
                        [
                            '2026-03-18',
                            '2026-06-15',
                            '2026-07-15',
                            '2026-08-12',
                        ]
                    )
                ) {

                    $duration = 120;

                }


                /*
                |--------------------------------------------------------------------------
                | Calculate Check-out
                |--------------------------------------------------------------------------
                */

                $checkOut = Carbon::createFromFormat(
                    'H:i:s',
                    $checkIn
                )
                    ->addMinutes($duration)
                    ->format('H:i:s');


                /*
                |--------------------------------------------------------------------------
                | Save Attendance
                |--------------------------------------------------------------------------
                */

                Attendance::create([

                    'name' =>
                        $employee['name'],

                    'department_name' =>
                        $employee['department_name'],

                    'designation_name' =>
                        $employee['designation_name'],

                    'employee_id' =>
                        $employee['employee_id'],

                    'select_date' =>
                        $date->format('Y-m-d'),

                    'month' =>
                        $date->format('F'),

                    'check_in' =>
                        $checkIn,

                    'late' =>
                        $isLate ? 'Yes' : 'No',

                    'check_out' =>
                        $checkOut,

                    'overtime' =>
                        $isOvertime ? 'Yes' : 'No',

                    'duration_minutes' =>
                        $duration,

                ]);


                $date->addDay();

            }

        }

    }
}
