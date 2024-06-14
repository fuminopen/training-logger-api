<?php

namespace Tests\Feature\WorkoutSet;

use App\Models\WorkoutSet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanUpdateWorkoutSet()
    {
        $workoutSet = WorkoutSet::factory()->create();

        $response = $this->putJson(route('workout_sets.update', $workoutSet), [
            'workout_detail_id' => $workoutSet->workout_detail_id,
            'set_number' => 2,
            'reps' => 12,
            'weight' => 55.0,
        ]);

        $response->assertOk();
        $response->assertJsonFragment([
            'set_number' => 2,
            'reps' => 12,
            'weight' => 55.0,
        ]);
    }
}
