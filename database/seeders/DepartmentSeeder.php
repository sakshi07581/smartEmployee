<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['department_name' => 'Human Resources',      'department_id' => 'HR'],
            ['department_name' => 'Information Technology','department_id' => 'IT'],
            ['department_name' => 'Finance',              'department_id' => 'FIN'],
            ['department_name' => 'Accounting',           'department_id' => 'ACC'],
            ['department_name' => 'Sales',                'department_id' => 'SAL'],
            ['department_name' => 'Marketing',            'department_id' => 'MKT'],
            ['department_name' => 'Customer Support',     'department_id' => 'CS'],
            ['department_name' => 'Operations',           'department_id' => 'OPS'],
            ['department_name' => 'Procurement',          'department_id' => 'PRC'],
            ['department_name' => 'Administration',       'department_id' => 'ADM'],
            ['department_name' => 'Research & Development','department_id' => 'RND'],
            ['department_name' => 'Legal',                'department_id' => 'LEG'],
            ['department_name' => 'Quality Assurance',    'department_id' => 'QA'],
            ['department_name' => 'Logistics',            'department_id' => 'LOG'],
            ['department_name' => 'Production',           'department_id' => 'PROD'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
