<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'user_id' => User::factory(),
            'job_title' => fake()->jobTitle(),
            'hire_date' => fake()->dateTimeThisYear(),
             'department_id' => Department::all()->random()->id,
            'is_active' => fake()->boolean(),
        ];
    }
}
