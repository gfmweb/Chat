<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetFullTextTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_full_text_message(): void
    {
        $response = $this->getJson('/api/v1/messages');
        $response->assertStatus(401);
    }
}
