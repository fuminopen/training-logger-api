<?php

namespace Tests\Feature\BodyPart;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_create_body_part()
    {
        $response = $this->postJson(route('body_parts.store'), ['name' => 'Arms']);
        $response->assertCreated();
        $response->assertJsonStructure(['id', 'name', 'created_at', 'updated_at']);
    }
}
