<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetUsersListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_users_list(): void
    {
        $response = $this->getJson('/api/v1/users');
        $response->assertStatus(401);
    }
}
