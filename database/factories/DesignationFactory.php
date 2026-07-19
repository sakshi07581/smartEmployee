<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\SalaryStructure;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'designation_name' => $this->faker->jobTitle(),
            'designation_id' => 'DSG' . $this->faker->unique()->numberBetween(100, 999),
            'department_id' => Department::inRandomOrder()->first()?->id
                ?? Department::factory(),
            'salary_structure_id' => SalaryStructure::inRandomOrder()->first()?->id
                ?? SalaryStructure::factory(),
        ];
    }
}
