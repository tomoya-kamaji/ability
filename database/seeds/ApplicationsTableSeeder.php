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
                'application_name' => 'Chrome',
                'description' => 'Google製の軽量のブラウザ',
                'image_pass' => 'testpass',
                'tag_id' => 1,
            ],
            [
                'application_name' => 'Evernote',
                'description' => 'メモツール',
                'image_pass' => 'testpass',
                'tag_id' => 2,
            ]
        ]);
    }
}
