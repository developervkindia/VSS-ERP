<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
             'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
             'assigned_to' => User::factory(),
            'due_date' => fake()->dateTimeBetween('now', '+6 months'),
            'status' => fake()->randomElement(['open','in_progress', 'completed', 'on_hold']),
        ];
    }
}
