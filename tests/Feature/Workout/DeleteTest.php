<?php

namespace Tests\Feature\Workout;

use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    public function testCanDeleteWorkout()
    {
        $workout = Workout::factory()->create();

        $response = $this->deleteJson(route('workouts.destroy', $workout));

        $response->assertNoContent();
        $this->assertDatabaseMissing('workouts', ['id' => $workout->id]);
    }
}
