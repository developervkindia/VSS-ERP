<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveRequest>
 */
class LeaveRequestFactory extends Factory
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
            'leave_type' => fake()->randomElement(['Sick Leave', 'Vacation', 'Personal Leave', 'Casual Leave']),
            'start_date' => fake()->dateTimeBetween('now', '+6 months'),
            'end_date' => fake()->dateTimeBetween('now +6 months', '+1 year'),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected']),
             'approved_by' => User::factory(),
           'notes' => fake()->paragraph(),
        ];
    }
}
