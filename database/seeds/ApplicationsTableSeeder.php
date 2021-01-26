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
                'trackId' =>  618783545,
                'trackName' => 'Slack',
                'artworkURL512' => 'https://is2-ssl.mzstatic.com/image/thumb/Purple124/v4/b3/43/f1/b343f1da-cec8-f8b3-92d7-d63af0f7e46e/source/512x512bb.jpg',
                'artistName' => 'Slack Technologies, Inc.',

            ]
        ]);
    }
}
