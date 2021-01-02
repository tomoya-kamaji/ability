<?php

use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            [
                'track_id' =>  618783545,
                'user_id' => '1',
            ],
            [
                'track_id' =>  618783545,
                'user_id' => '2',
            ],
            [
                'track_id' =>  618783545,
                'user_id' => '3',
            ],
            [
                'track_id' =>  618783545,
                'user_id' => '4',
            ],
        ]);
    }
}
