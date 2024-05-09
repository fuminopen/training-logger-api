<?php

namespace Tests\Feature\Exercise;

use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function testCanListExercises(): void
    {
        $this->withoutExceptionHandling();

        Exercise::factory()->count(5)->create();

        $response = $this->getJson(route('exercises.index'));

        $response->assertOk();

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'description',
                    'body_part' => [
                        'id',
                        'name',
                        'created_at',
                        'updated_at',
                    ],
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }
}
