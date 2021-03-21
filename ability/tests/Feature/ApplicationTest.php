<?php

namespace Tests\Feature;

use App\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $article = factory(Application::class)->create();

        $result = $article->isLikedBy(null);

        $this->assertFalse($result);
    }




}
