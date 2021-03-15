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
                'categorys_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'trackId' =>  461504587,
                'trackName' => 'Trello',
                'artworkURL512' => 'https://is5-ssl.mzstatic.com/image/thumb/Purple114/v4/4c/30/ca/4c30ca4f-5d40-b31f-544d-8c18b1600dbb/source/512x512bb.jpg',
                'artistName' => 'Trello,',
                'categorys_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'trackId' =>  1232780281,
                'trackName' => 'Notion',
                'artworkURL512' => 'https://is1-ssl.mzstatic.com/image/thumb/Purple124/v4/e5/d5/73/e5d5730a-423c-7875-6f75-3532f929b502/source/512x512bb.jpg',
                'artistName' => 'Notion.',
                'categorys_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
    }
}
