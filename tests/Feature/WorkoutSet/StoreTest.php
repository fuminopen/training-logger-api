<?php

namespace Tests\Feature\WorkoutSet;

use App\Models\WorkoutDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanCreateWorkoutSet()
    {
        $workoutDetail = WorkoutDetail::factory()->create();

        $response = $this->postJson(route('workout_sets.store'), [
            'workout_detail_id' => $workoutDetail->id,
            'set_number' => 1,
            'reps' => 10,
            'weight' => 50.0,
        ]);

        $response->assertCreated();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'workout_detail_id',
                'set_number',
                'reps',
                'weight',
                'created_at',
                'updated_at',
            ],
        ]);
    }
}
