<?php

namespace Tests\Feature\WorkoutDetail;

use App\Models\WorkoutDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanDeleteWorkoutDetail()
    {
        $workoutDetail = WorkoutDetail::factory()->create();

        $response = $this->deleteJson(route('workout_details.destroy', $workoutDetail));

        $response->assertNoContent();
        $this->assertDatabaseMissing('workout_details', ['id' => $workoutDetail->id]);
    }
}
