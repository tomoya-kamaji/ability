<?php

use Illuminate\Database\Seeder;

class ApplicationUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_user')->insert([
            [
                'application_id' =>  1,
                'user_id' => '1',
                'content' => 'いい感じだよー。',
                'evaluations' => '5',

            ],
            [
                'application_id' =>  1,
                'user_id' => '2',
                'content' => 'いい感じだよー。',
                'evaluations' => '5',

            ],
            [
                'application_id' =>  1,
                'user_id' => '3',
                'content' => 'いい感じだよー。',
                'evaluations' => '5',

            ],
        ]);
    }
}
