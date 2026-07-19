<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            [  'joining_mode' => 'Full Time','name'=>'Roshan Dhungana','employee_id'=>'EMP001','department_id'=>2,'designation_id'=>6,'salary_structure_id'=>3,'date_of_birth'=>'1999-05-15','hire_date'=>'2023-01-10','email'=>'roshan@example.com','phone'=>'9801000001','location'=>'Kathmandu'],
            [  'joining_mode' => 'Full Time','name'=>'Sujan Karki','employee_id'=>'EMP002','department_id'=>2,'designation_id'=>5,'salary_structure_id'=>2,'date_of_birth'=>'1996-03-12','hire_date'=>'2021-06-15','email'=>'sujan@example.com','phone'=>'9801000002','location'=>'Lalitpur'],
            [  'joining_mode' => 'Full Time','name'=>'Suman Shrestha','employee_id'=>'EMP003','department_id'=>5,'designation_id'=>16,'salary_structure_id'=>3,'date_of_birth'=>'1998-08-10','hire_date'=>'2022-02-20','email'=>'suman@example.com','phone'=>'9801000003','location'=>'Bhaktapur'],
            [  'joining_mode' => 'Full Time','name'=>'Bibek Gautam','employee_id'=>'EMP004','department_id'=>1,'designation_id'=>2,'salary_structure_id'=>2,'date_of_birth'=>'1997-04-18','hire_date'=>'2021-09-01','email'=>'bibek@example.com','phone'=>'9801000004','location'=>'Pokhara'],
            [  'joining_mode' => 'Full Time','name'=>'Prakash Adhikari','employee_id'=>'EMP005','department_id'=>3,'designation_id'=>11,'salary_structure_id'=>2,'date_of_birth'=>'1995-01-25','hire_date'=>'2020-11-10','email'=>'prakash@example.com','phone'=>'9801000005','location'=>'Butwal'],
            [  'joining_mode' => 'Full Time','name'=>'Nabin Poudel','employee_id'=>'EMP006','department_id'=>4,'designation_id'=>13,'salary_structure_id'=>3,'date_of_birth'=>'1998-12-09','hire_date'=>'2023-04-01','email'=>'nabin@example.com','phone'=>'9801000006','location'=>'Chitwan'],
            [  'joining_mode' => 'Full Time','name'=>'Kiran Thapa','employee_id'=>'EMP007','department_id'=>6,'designation_id'=>20,'salary_structure_id'=>3,'date_of_birth'=>'1997-07-14','hire_date'=>'2022-05-12','email'=>'kiran@example.com','phone'=>'9801000007','location'=>'Dharan'],
            [  'joining_mode' => 'Full Time','name'=>'Anisha Koirala','employee_id'=>'EMP008','department_id'=>7,'designation_id'=>22,'salary_structure_id'=>4,'date_of_birth'=>'2000-10-01','hire_date'=>'2024-01-08','email'=>'anisha@example.com','phone'=>'9801000008','location'=>'Biratnagar'],
            [  'joining_mode' => 'Full Time','name'=>'Sabina Rai','employee_id'=>'EMP009','department_id'=>10,'designation_id'=>28,'salary_structure_id'=>4,'date_of_birth'=>'1999-06-19','hire_date'=>'2023-03-18','email'=>'sabina@example.com','phone'=>'9801000009','location'=>'Itahari'],
            [  'joining_mode' => 'Full Time','name'=>'Ramesh KC','employee_id'=>'EMP010','department_id'=>8,'designation_id'=>24,'salary_structure_id'=>3,'date_of_birth'=>'1996-09-11','hire_date'=>'2021-12-05','email'=>'ramesh@example.com','phone'=>'9801000010','location'=>'Nepalgunj'],

            [  'joining_mode' => 'Full Time','name'=>'Milan Bhandari','employee_id'=>'EMP011','department_id'=>2,'designation_id'=>9,'salary_structure_id'=>3,'date_of_birth'=>'1998-11-02','hire_date'=>'2022-08-01','email'=>'milan@example.com','phone'=>'9801000011','location'=>'Kathmandu'],
            [  'joining_mode' => 'Full Time','name'=>'Aayusha Sharma','employee_id'=>'EMP012','department_id'=>6,'designation_id'=>19,'salary_structure_id'=>2,'date_of_birth'=>'1997-05-27','hire_date'=>'2020-07-20','email'=>'aayusha@example.com','phone'=>'9801000012','location'=>'Lalitpur'],
            [  'joining_mode' => 'Full Time','name'=>'Dipesh Neupane','employee_id'=>'EMP013','department_id'=>14,'designation_id'=>34,'salary_structure_id'=>4,'date_of_birth'=>'1999-02-16','hire_date'=>'2024-02-10','email'=>'dipesh@example.com','phone'=>'9801000013','location'=>'Hetauda'],
            [  'joining_mode' => 'Full Time','name'=>'Sarita Tamang','employee_id'=>'EMP014','department_id'=>12,'designation_id'=>30,'salary_structure_id'=>2,'date_of_birth'=>'1994-12-20','hire_date'=>'2019-10-14','email'=>'sarita@example.com','phone'=>'9801000014','location'=>'Kathmandu'],
            [  'joining_mode' => 'Full Time','name'=>'Bikash Oli','employee_id'=>'EMP015','department_id'=>15,'designation_id'=>37,'salary_structure_id'=>5,'date_of_birth'=>'2001-01-08','hire_date'=>'2024-05-01','email'=>'bikash@example.com','phone'=>'9801000015','location'=>'Dang'],
            [  'joining_mode' => 'Full Time','name'=>'Saraswati Gurung','employee_id'=>'EMP016','department_id'=>13,'designation_id'=>32,'salary_structure_id'=>3,'date_of_birth'=>'1996-06-30','hire_date'=>'2022-01-15','email'=>'saraswati@example.com','phone'=>'9801000016','location'=>'Pokhara'],
            [  'joining_mode' => 'Full Time','name'=>'Ashish Regmi','employee_id'=>'EMP017','department_id'=>5,'designation_id'=>17,'salary_structure_id'=>4,'date_of_birth'=>'2000-08-22','hire_date'=>'2024-03-12','email'=>'ashish@example.com','phone'=>'9801000017','location'=>'Janakpur'],
            [  'joining_mode' => 'Full Time','name'=>'Rojina Lama','employee_id'=>'EMP018','department_id'=>9,'designation_id'=>26,'salary_structure_id'=>3,'date_of_birth'=>'1998-04-05','hire_date'=>'2023-06-18','email'=>'rojina@example.com','phone'=>'9801000018','location'=>'Kathmandu'],
            [  'joining_mode' => 'Full Time','name'=>'Hari Prasad Nepal','employee_id'=>'EMP019','department_id'=>11,'designation_id'=>29,'salary_structure_id'=>2,'date_of_birth'=>'1995-07-09','hire_date'=>'2020-09-07','email'=>'hari@example.com','phone'=>'9801000019','location'=>'Birgunj'],
            [  'joining_mode' => 'Full Time','name'=>'Puja Acharya','employee_id'=>'EMP020','department_id'=>3,'designation_id'=>10,'salary_structure_id'=>2,'date_of_birth'=>'1997-09-13','hire_date'=>'2021-04-25','email'=>'puja@example.com','phone'=>'9801000020','location'=>'Bhairahawa'],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
