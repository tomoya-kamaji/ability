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
                'name' => 'yamada',
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
                'name' => 'iwasa',
                'email' => 'iwasa@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/iycFDMPzzPpX07cYsVajg6Cr5zxeGxjNDc0YQNGc.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'makoto',
                'email' => 'makoto@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/QjG387KjEqdXgkXp7AHLX5yz68qBe55JILAcyEUb.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'shiose',
                'email' => 'shiose@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "エンジニア",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/XfZ4AC5IeqG6JpEcXhZm4H01d9Dgu5uYqeWKLwoH.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'wada',
                'email' => 'wada@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "バックオフィス",
                'path' => "https://ability-backet.s3.ap-northeast-1.amazonaws.com/profile/XfZ4AC5IeqG6JpEcXhZm4H01d9Dgu5uYqeWKLwoH.png",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
