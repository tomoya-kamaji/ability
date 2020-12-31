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
                'application_name' => 'Vivaldi',
                'description' => '色々できるやつ',
                'image_pass' => 'testpass',
                'tag_id' => 1,
            ],
            [
                'application_name' => 'InternetExploler',
                'description' => 'Microsoftのブラウザ',
                'image_pass' => 'testpass',
                'tag_id' => 1,
            ],
            [
                'application_name' => 'Notion',
                'description' => '多種多様なメモツール',
                'image_pass' => 'testpass',
                'tag_id' => 2,
            ],
            [
                'application_name' => 'Evernote',
                'description' => '元祖メモツール',
                'image_pass' => 'testpass',
                'tag_id' => 2,
            ],
            [
                'application_name' => 'OneNote',
                'description' => 'Microsoft製のメモツール',
                'image_pass' => 'testpass',
                'tag_id' => 2,
            ],
            [
                'application_name' => '紙のノート',
                'description' => '元祖',
                'image_pass' => 'testpass',
                'tag_id' => 2,
            ],
            [
                'application_name' => 'Vusual Studio Code',
                'description' => 'マイクロソフト製のテキストエディタ',
                'image_pass' => 'testpass',
                'tag_id' => 3,
            ]
        ]);
    }
}
