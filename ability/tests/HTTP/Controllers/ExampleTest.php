
<?php

// namespace tests\Http\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function 簡単な画面のテスト()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    /** @test */
    public function 簡単なデータベース接続のテスト()
    {
        // テスト用ユーザーの生成
        User::create([
            'name' => 'testTaro',
            'email' => 'example777@mail.com',
            'password' => "testPass"
        ]);
        // 作成したユーザーがdbにあるかチェック
        $this->assertDatabaseHas('users', [
            'name' => 'testTaro',
            'email' => 'example777@mail.com',
            'password' => "testPass"
        ]);
    }
}
