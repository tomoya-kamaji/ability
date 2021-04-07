<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '山田太郎',
                'email' => 'guest@guest.com',
                'password' => Hash::make('password'),
                'profession' => "エンジニア",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/pi3qp9PhNOooJxZ78IEjyXqaEkn1glXpo7LytxXQ.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'tomoya',
                'email' => 'tomoya.kamaji@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "エンジニア",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/lxwz8Nc8eGqYdHvW06O5EQxa0AwafayQgPkcHbmK.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'name' => 'sakura',
                'email' => 'sakura@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "エンジニア",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/pF7F5GeFNsKNGcEFvITwF3wgka4nGwmXAoqaCUWq.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'masako',
                'email' => 'masako@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/lxwz8Nc8eGqYdHvW06O5EQxa0AwafayQgPkcHbmK.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/lxwz8Nc8eGqYdHvW06O5EQxa0AwafayQgPkcHbmK.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'test1',
                'email' => 'test1@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/lxwz8Nc8eGqYdHvW06O5EQxa0AwafayQgPkcHbmK.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'test2',
                'email' => 'test2@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/lxwz8Nc8eGqYdHvW06O5EQxa0AwafayQgPkcHbmK.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
