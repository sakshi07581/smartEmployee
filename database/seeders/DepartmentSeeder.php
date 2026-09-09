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
            [
                'name'            => 'Human Resources',
                'department_name' => 'Human Resources',
                'department_id'   => 'HR',
            ],
            [
                'name'            => 'Information Technology',
                'department_name' => 'Information Technology',
                'department_id'   => 'IT',
            ],
            [
                'name'            => 'Finance',
                'department_name' => 'Finance',
                'department_id'   => 'FIN',
            ],
            [
                'name'            => 'Accounting',
                'department_name' => 'Accounting',
                'department_id'   => 'ACC',
            ],
            [
                'name'            => 'Sales',
                'department_name' => 'Sales',
                'department_id'   => 'SAL',
            ],
            [
                'name'            => 'Marketing',
                'department_name' => 'Marketing',
                'department_id'   => 'MKT',
            ],
            [
                'name'            => 'Customer Support',
                'department_name' => 'Customer Support',
                'department_id'   => 'CS',
            ],
            [
                'name'            => 'Operations',
                'department_name' => 'Operations',
                'department_id'   => 'OPS',
            ],
            [
                'name'            => 'Procurement',
                'department_name' => 'Procurement',
                'department_id'   => 'PRC',
            ],
            [
                'name'            => 'Administration',
                'department_name' => 'Administration',
                'department_id'   => 'ADM',
            ],
            [
                'name'            => 'Research & Development',
                'department_name' => 'Research & Development',
                'department_id'   => 'RND',
            ],
            [
                'name'            => 'Legal',
                'department_name' => 'Legal',
                'department_id'   => 'LEG',
            ],
            [
                'name'            => 'Quality Assurance',
                'department_name' => 'Quality Assurance',
                'department_id'   => 'QA',
            ],
            [
                'name'            => 'Logistics',
                'department_name' => 'Logistics',
                'department_id'   => 'LOG',
            ],
            [
                'name'            => 'Production',
                'department_name' => 'Production',
                'department_id'   => 'PROD',
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
