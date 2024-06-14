<?php

namespace Tests\Feature\WorkoutDetail;

use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanCreateWorkoutDetail()
    {
        $workout = Workout::factory()->create();
        $exercise = Exercise::factory()->create();

        $response = $this->postJson(route('workout_details.store'), [
            'workout_id' => $workout->id,
            'exercise_id' => $exercise->id,
        ]);

        $response->assertCreated();
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
