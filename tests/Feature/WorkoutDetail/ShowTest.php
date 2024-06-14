<?php

namespace Tests\Feature\WorkoutDetail;

use App\Models\WorkoutDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanShowWorkoutDetail()
    {
        $workoutDetail = WorkoutDetail::factory()->create();

        $response = $this->getJson(route('workout_details.show', $workoutDetail));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'workout_id',
                'exercise_id',
                'created_at',
                'updated_at',
            ],
        ]);
    }
}
