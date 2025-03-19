<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TranslationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_create_translation()
    {
        $response = $this->postJson('/api/translations', [
            'locale' => 'en',
            'key' => 'greeting',
            'content' => 'Hello',
            'tags' => ['mobile', 'web'],
        ]);

        $response->assertStatus(201);
    }
}
