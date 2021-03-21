<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationControllerTest extends TestCase
{

    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200)
            ->assertViewIs('home');
    }
}
