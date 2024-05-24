<?php

namespace Tests\Feature\Workout;

use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCanUpdateWorkout(): void
    {
        $workout = Workout::factory()->create();

        $response = $this->putJson(route('workouts.update', $workout), [
            'user_id' => $workout->user_id,
            'date' => '2023-01-01',
            'notes' => 'Updated workout',
        ]);

        $response->assertOk();
        $response->assertJsonFragment([
            'notes' => 'Updated workout',
        ]);
    }
}
