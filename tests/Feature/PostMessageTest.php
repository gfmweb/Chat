<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostMessageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_post_message(): void
    {
        $response = $this->postJson('/api/v1/messages');
        $response->assertStatus(401);
    }
}
