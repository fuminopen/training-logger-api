<?php

namespace Tests\Feature\WorkoutSet;

use App\Models\WorkoutSet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanDeleteWorkoutSet()
    {
        $workoutSet = WorkoutSet::factory()->create();

        $response = $this->deleteJson(route('workout_sets.destroy', $workoutSet));

        $response->assertNoContent();
        $this->assertDatabaseMissing('workout_sets', ['id' => $workoutSet->id]);
    }
}
