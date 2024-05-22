<?php

namespace Tests\Feature\Workout;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateWorkout()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $response = $this->postJson(route('workouts.store'), [
            'user_id' => $user->id,
            'date' => '2023-01-01',
            'notes' => 'Test workout',
        ]);

        $response->assertCreated();
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
