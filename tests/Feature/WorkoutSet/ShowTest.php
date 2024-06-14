<?php

namespace Tests\Feature\WorkoutSet;

use App\Models\WorkoutSet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanShowWorkoutSet()
    {
        $workoutSet = WorkoutSet::factory()->create();

        $response = $this->getJson(route('workout_sets.show', $workoutSet));

        $response->assertOk();
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
