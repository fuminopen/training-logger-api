<?php

namespace Tests\Feature\Exercise;

use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testCanUpdateExercise(): void
    {
        $exercise = Exercise::factory()->create();

        $response = $this->put(route('exercise.update', $exercise->id), [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('exercises', [
            'id' => $exercise->id,
            'name' => $exercise->name,
            'description' => $exercise->description,
        ]);
    }
}
