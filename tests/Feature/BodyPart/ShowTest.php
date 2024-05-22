<?php

namespace Tests\Feature\BodyPart;

use App\Models\BodyPart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    public function testCanShowBodyPart()
    {
        $bodyPart = BodyPart::factory()->create();

        $response = $this->getJson(route('body_parts.show', $bodyPart));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'created_at',
                'updated_at',
            ],
        ]);
    }
}
