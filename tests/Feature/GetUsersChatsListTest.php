<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetUsersChatsListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_users_chat_list(): void
    {
        $response = $this->getJson('/api/v1/chats');
        $response->assertStatus(401);
    }
}
