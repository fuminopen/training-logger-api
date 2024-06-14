<?php

namespace Tests\Feature\WorkoutDetail;

use App\Models\Exercise;
use App\Models\WorkoutDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanUpdateWorkoutDetail()
    {
        $workoutDetail = WorkoutDetail::factory()->create();
        $exercise = Exercise::factory()->create();

        $response = $this->putJson(route('workout_details.update', $workoutDetail), [
            'workout_id' => $workoutDetail->workout_id,
            'exercise_id' => $exercise->id,
        ]);

        $response->assertOk();
        $response->assertJsonFragment([
            'exercise_id' => $exercise->id,
        ]);
    }
}
