<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagePath = 'https://i.ibb.co/1sspJdY/Akik-Hossain.jpg';

        User::create([
            'name' => 'sakshi karn',
            'role' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'image' => $imagePath,
        ]);
         User::create([
            'name' => 'Employee Sakshi',
            'role' => 'Employee',
            'email' => 'sakshi@employee.com',
            'password' => bcrypt('123456789'),
            'image' => $imagePath,
        ]);
    }
}
