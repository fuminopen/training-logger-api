<?php

namespace Tests\Feature\Exercise;

use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $exersise = Exercise::factory()->create();

        $response = $this->get(route('exercises.show', $exersise));

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => $exersise->id,
                'name' => $exersise->name,
                'description' => $exersise->description,
                'created_at' => $exersise->created_at->toISOString(),
                'updated_at' => $exersise->updated_at->toISOString(),
            ],
        ]);
    }
}
