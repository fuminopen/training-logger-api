<?php

namespace Tests\Feature\Workout;

use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    public function testCanShowWorkout()
    {
        $workout = Workout::factory()->create();

        $response = $this->getJson(route('workouts.show', $workout));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'user_id',
                'date',
                'notes',
                'created_at',
                'updated_at',
            ],
        ]);
    }
}
