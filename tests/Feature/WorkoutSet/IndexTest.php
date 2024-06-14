<?php

namespace Tests\Feature\WorkoutSet;

use App\Models\WorkoutSet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanListWorkoutSets()
    {
        WorkoutSet::factory()->count(5)->create();

        $response = $this->getJson(route('workout_sets.index'));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'workout_detail_id',
                    'set_number',
                    'reps',
                    'weight',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }
}
