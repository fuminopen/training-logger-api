<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalRecord>
 */
class PersonalRecordFactory extends Factory
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
            'exercise_id' => Exercise::factory(),
            'value' => $this->faker->randomFloat(2, 1, 500),
            'unit' => $this->faker->randomElement(['kg', 'lbs']),
            'achieved_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'notes' => $this->faker->optional(0.7)->sentence,
        ];
    }
}