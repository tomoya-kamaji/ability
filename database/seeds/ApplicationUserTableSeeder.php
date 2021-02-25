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
                'user_id' => 1,
                'title' => 'Slackは素晴らしいアプリです',
                'good_point' => 'Chat workやSkypeなどと比べ何よりも長けているところは、外部ツールとのAPI連携の部分です。様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),

            ],
            [
                'application_id' =>  1,
                'user_id' => 2,
                'title' => '非エンジニアには使いにくい、、。',
                'good_point' => '可愛くて見やすい',
                'improvement_point' => '非エンジニアには使いにくい、、。',
                'evaluation' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'application_id' =>  1,
                'user_id' => 3,
                'title' => 'Slackは素晴らしいアプリです',
                'good_point' => 'Chat workやSkypeなどと比べ何よりも長けているところは、外部ツールとのAPI連携の部分です。様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'application_id' =>  2,
                'user_id' => 1,
                'title' => '素晴らしい',
                'good_point' => 'Chat workやSkypeなどと比べ何よりも長けているところは、外部ツールとのAPI連携の部分です。様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'application_id' =>  3,
                'user_id' => 1,
                'title' => 'Notionは素晴らしいアプリです',
                'good_point' => 'Chat workやSkypeなどと比べ何よりも長けているところは、外部ツールとのAPI連携の部分です。様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
