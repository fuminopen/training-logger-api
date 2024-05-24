<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutDetailFactory extends Factory
{
    protected $model = \App\Models\WorkoutDetail::class;

    public function definition()
    {
        return [
            'workout_id' => Workout::factory(),
            'exercise_id' => Exercise::factory(),
        ];
    }
}
