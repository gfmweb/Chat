<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateChatTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_chat(): void
    {
        $response = $this->postJson('/api/v1/chats');
        $response->assertStatus(401);
    }
}
