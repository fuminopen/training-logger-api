<?php

namespace Tests\Feature\Exercise;

use App\Models\BodyPart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testMakeExercise()
    {
        $response = $this->postJson(route('exercises.store'), [
            'name' => $this->faker->word,
            'body_part_id' => BodyPart::factory()->create()->id,
        ]);

        $response->assertCreated();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'description',
                'body_part' => [
                    'id',
                    'name',
                ],
                'created_at',
                'updated_at',
            ],
        ]);
    }
}
