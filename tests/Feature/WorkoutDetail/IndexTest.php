<?php

namespace Tests\Feature\WorkoutDetail;

use App\Models\WorkoutDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanListWorkoutDetails()
    {
        WorkoutDetail::factory()->count(5)->create();

        $response = $this->getJson(route('workout_details.index'));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'workout_id',
                    'exercise_id',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }
}
