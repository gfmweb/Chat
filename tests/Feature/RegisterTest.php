<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register(): void
    {
        $response = $this->postJson('/api/v1/register');
        $response->assertStatus(422);
    }
}
