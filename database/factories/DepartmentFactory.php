<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'department_name' => $this->faker->unique()->randomElement([
                'Engineering',
                'Sales',
                'Marketing',
                'HR',
                'Finance',
                'Support',
            ]),
            'department_id' => 'DPT' . $this->faker->unique()->numberBetween(100, 999),
        ];
    }
}
