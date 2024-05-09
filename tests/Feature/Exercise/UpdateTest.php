<?php

namespace Tests\Feature\Exercise;

use App\Models\Exercise;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testCanUpdateExercise(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $exercise = Exercise::factory()->create();

        $name = $this->faker->name;
        $description = $this->faker->text;

        $response = $this->actingAs($user)->put(route('exercises.update', $exercise->id), [
            'name' => $name,
            'description' => $description,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('exercises', [
            'id' => $exercise->id,
            'name' => $name,
            'description' => $description,
        ]);
    }
}
