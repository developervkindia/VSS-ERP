<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerformanceEvaluation>
 */
class PerformanceEvaluationFactory extends Factory
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
            'evaluation_cycle' => fake()->monthName().'-'.fake()->year(),
            'evaluation_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'overall_rating' => fake()->randomElement(['Excellent', 'Good', 'Average', 'Below Average']),
            'notes' => fake()->paragraph(),
        ];
    }
}
