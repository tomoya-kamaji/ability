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
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'tomoya',
                'email' => 'tomoya.kamaji@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "エンジニア",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'name' => 'sakura',
                'email' => 'sakura@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "エンジニア",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'masako',
                'email' => 'masako@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'test1',
                'email' => 'test1@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'test2',
                'email' => 'test2@gmail.com',
                'password' => Hash::make('password'),
                'profession' => "医療関係",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
