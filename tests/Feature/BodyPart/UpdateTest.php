<?php

namespace Tests\Feature\BodyPart;

use App\Models\BodyPart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    public function testCanUpdateBodyPart()
    {
        $bodyPart = BodyPart::factory()->create();

        $response = $this->putJson(route('body_parts.update', $bodyPart), [
            'name' => 'Updated Name',
        ]);

        $response->assertOk();
        $response->assertJsonFragment([
            'name' => 'Updated Name',
        ]);
    }
}
