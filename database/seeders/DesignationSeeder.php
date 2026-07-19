<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [

            // Human Resources (Department 1)
            ['designation_name' => 'HR Manager',          'designation_id' => 'HRM',  'salary_structure_id' => 8, 'department_id' => 1],
            ['designation_name' => 'HR Executive',        'designation_id' => 'HRE',  'salary_structure_id' => 5, 'department_id' => 1],
            ['designation_name' => 'HR Assistant',        'designation_id' => 'HRA',  'salary_structure_id' => 3, 'department_id' => 1],

            // IT (Department 2)
            ['designation_name' => 'IT Manager',          'designation_id' => 'ITM',  'salary_structure_id' => 9, 'department_id' => 2],
            ['designation_name' => 'Senior Developer',    'designation_id' => 'SD',   'salary_structure_id' => 8, 'department_id' => 2],
            ['designation_name' => 'Software Developer',  'designation_id' => 'DEV',  'salary_structure_id' => 6, 'department_id' => 2],
            ['designation_name' => 'QA Engineer',         'designation_id' => 'QAE',  'salary_structure_id' => 5, 'department_id' => 2],
            ['designation_name' => 'System Administrator','designation_id' => 'SYS',  'salary_structure_id' => 6, 'department_id' => 2],
            ['designation_name' => 'IT Support',          'designation_id' => 'ITS',  'salary_structure_id' => 4, 'department_id' => 2],

            // Finance (Department 3)
            ['designation_name' => 'Finance Manager',     'designation_id' => 'FM',   'salary_structure_id' => 8, 'department_id' => 3],
            ['designation_name' => 'Financial Analyst',   'designation_id' => 'FA',   'salary_structure_id' => 6, 'department_id' => 3],

            // Accounting (Department 4)
            ['designation_name' => 'Chief Accountant',    'designation_id' => 'CA',   'salary_structure_id' => 7, 'department_id' => 4],
            ['designation_name' => 'Accountant',          'designation_id' => 'ACC',  'salary_structure_id' => 5, 'department_id' => 4],
            ['designation_name' => 'Accounts Assistant',  'designation_id' => 'ACA',  'salary_structure_id' => 3, 'department_id' => 4],

            // Sales (Department 5)
            ['designation_name' => 'Sales Manager',       'designation_id' => 'SM',   'salary_structure_id' => 8, 'department_id' => 5],
            ['designation_name' => 'Sales Executive',     'designation_id' => 'SE',   'salary_structure_id' => 5, 'department_id' => 5],
            ['designation_name' => 'Sales Representative','designation_id' => 'SR',   'salary_structure_id' => 3, 'department_id' => 5],

            // Marketing (Department 6)
            ['designation_name' => 'Marketing Manager',   'designation_id' => 'MM',   'salary_structure_id' => 8, 'department_id' => 6],
            ['designation_name' => 'Marketing Executive', 'designation_id' => 'ME',   'salary_structure_id' => 5, 'department_id' => 6],
            ['designation_name' => 'Content Creator',     'designation_id' => 'CC',   'salary_structure_id' => 4, 'department_id' => 6],

            // Customer Support (Department 7)
            ['designation_name' => 'Support Manager',     'designation_id' => 'SUPM', 'salary_structure_id' => 7, 'department_id' => 7],
            ['designation_name' => 'Support Officer',     'designation_id' => 'SUPO', 'salary_structure_id' => 3, 'department_id' => 7],

            // Operations (Department 8)
            ['designation_name' => 'Operations Manager',  'designation_id' => 'OM',   'salary_structure_id' => 8, 'department_id' => 8],
            ['designation_name' => 'Operations Officer',  'designation_id' => 'OO',   'salary_structure_id' => 4, 'department_id' => 8],

            // Procurement (Department 9)
            ['designation_name' => 'Procurement Manager', 'designation_id' => 'PM',   'salary_structure_id' => 7, 'department_id' => 9],
            ['designation_name' => 'Procurement Officer', 'designation_id' => 'PO',   'salary_structure_id' => 4, 'department_id' => 9],

            // Administration (Department 10)
            ['designation_name' => 'Admin Manager',       'designation_id' => 'AM',   'salary_structure_id' => 7, 'department_id' => 10],
            ['designation_name' => 'Administrative Officer','designation_id' => 'AO', 'salary_structure_id' => 4, 'department_id' => 10],

            // R&D (Department 11)
            ['designation_name' => 'Research Lead',       'designation_id' => 'RL',   'salary_structure_id' => 8, 'department_id' => 11],
            ['designation_name' => 'Research Associate',  'designation_id' => 'RA',   'salary_structure_id' => 5, 'department_id' => 11],

            // Legal (Department 12)
            ['designation_name' => 'Legal Advisor',       'designation_id' => 'LA',   'salary_structure_id' => 8, 'department_id' => 12],
            ['designation_name' => 'Legal Officer',       'designation_id' => 'LO',   'salary_structure_id' => 5, 'department_id' => 12],

            // QA (Department 13)
            ['designation_name' => 'QA Manager',          'designation_id' => 'QAM',  'salary_structure_id' => 7, 'department_id' => 13],
            ['designation_name' => 'QA Analyst',          'designation_id' => 'QAA',  'salary_structure_id' => 5, 'department_id' => 13],

            // Logistics (Department 14)
            ['designation_name' => 'Logistics Manager',   'designation_id' => 'LM',   'salary_structure_id' => 7, 'department_id' => 14],
            ['designation_name' => 'Logistics Officer',   'designation_id' => 'LGO',  'salary_structure_id' => 4, 'department_id' => 14],

            // Production (Department 15)
            ['designation_name' => 'Production Manager',  'designation_id' => 'PRM',  'salary_structure_id' => 8, 'department_id' => 15],
            ['designation_name' => 'Production Supervisor','designation_id' => 'PRS', 'salary_structure_id' => 5, 'department_id' => 15],
            ['designation_name' => 'Production Operator', 'designation_id' => 'PRO',  'salary_structure_id' => 2, 'department_id' => 15],
        ];

        foreach ($designations as $designation) {
            Designation::create($designation);
        }
    }
}
