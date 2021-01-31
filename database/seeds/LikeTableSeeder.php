<?php

use Illuminate\Database\Seeder;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            [
                'application_id' =>  1,
                'user_id' => 1,

            ],
            [
                'application_id' =>  1,
                'user_id' => 2,

            ],
            [
                'application_id' =>  2,
                'user_id' => 3,

            ],
        ]);
    }
}
