<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use UsersTableSeeder;
use Tests\TestCase;


class ApplicationControllerTest extends TestCase
{
    // use RefreshDatabase;



    public function testIndex()
    {
        $response = $this->get(route('application.index'));

        $response->assertStatus(200)->assertViewIs('application.index');
    }

    //未ログイン
    public function testGuestEdit()
    {
        $response = $this->get(route('application.edit', 1));
        $response->assertRedirect(route('login'));
    }

    // //ログイン済
    // public function testAuthCreate()
    // {
    //     $user = factory(User::class)->create();

    //     $response = $this->actingAs($user)
    //         ->get(route('application.edit', 1));

    //     $response->assertStatus(200)
    //         ->assertViewIs('application.edit');
    // }


}
