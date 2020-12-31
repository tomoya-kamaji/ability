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
                'name' => 'tomoya',
                'email' => 'tomoya.kamaji@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'sakura',
                'email' => 'sakura@gmail.com',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
