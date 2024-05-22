<?php

namespace Tests\Feature\BodyPart;

use App\Models\BodyPart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    public function testCanDeleteBodyPart()
    {
        $bodyPart = BodyPart::factory()->create();

        $response = $this->deleteJson(route('body_parts.destroy', $bodyPart));

        $response->assertNoContent();
        $this->assertDatabaseMissing('body_parts', ['id' => $bodyPart->id]);
    }
}
