<?php

namespace Database\Factories;

use App\Models\WorkoutSet;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutSetFactory extends Factory
{
    protected $model = WorkoutSet::class;

    public function definition()
    {
        return [
            'workout_detail_id' => \App\Models\WorkoutDetail::factory(),
            'set_number' => $this->faker->numberBetween(1, 5),
            'reps' => $this->faker->numberBetween(5, 15),
            'weight' => $this->faker->numberBetween(20, 100),
        ];
    }
}
