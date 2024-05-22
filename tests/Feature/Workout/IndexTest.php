<?php

namespace Tests\Feature\Workout;

use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function testCanListWorkouts()
    {
        Workout::factory()->count(5)->create();

        $response = $this->getJson(route('workouts.index'));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'user_id',
                    'date',
                    'notes',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }
}
