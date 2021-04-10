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
                'created_at' => new DateTime('2021-04-08 23:01:05'),
                'updated_at' => new DateTime('2021-04-08 23:01:05'),
            ],
            [
                'application_id' =>  1,
                'user_id' => 2,
                'title' => '正直微妙でした、、。',
                'good_point' => 'Skypeよりはましですが、Teamsの方が個人的には使いやすいです。',
                'improvement_point'=> 'Officeとの互換性がない！！。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 2,
                'created_at' => new DateTime('2021-04-07 13:01:05'),
                'updated_at' => new DateTime('2021-04-07 13:01:05'),
            ],
            [
                'application_id' =>  1,
                'user_id' => 3,
                'title' => 'エンジニアのチャットはこれ',
                'good_point' => '外部ツールとのAPI連携の部分です。様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 5,
                'created_at' => new DateTime('2021-04-07 13:01:05'),
                'updated_at' => new DateTime('2021-04-07 13:01:05'),
            ],
            [
                'application_id' =>  1,
                'user_id' => 4,
                'title' => 'Slackはbetter',
                'good_point' => '様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'application_id' =>  2,
                'user_id' => 1,
                'title' => '直感的で使いやすい！',
                'good_point' => '直感的で使いやすいです！慣れたらむしろスマートでいいように感じました。',
                'improvement_point' => 'セキュリティ事故があったので、1点マイナス、、。',
                'evaluation' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'application_id' =>  4,
                'user_id' => 4,
                'title' => 'Notionは素晴らしいアプリです',
                'good_point' => 'Chat workやSkypeなどと比べ何よりも長けているところは、外部ツールとのAPI連携の部分です。様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 4,
                'created_at' => new DateTime('2021-04-08 22:02:25'),
                'updated_at' => new DateTime('2021-04-08 22:02:25'),
            ],
            [
                'application_id' =>  3,
                'user_id' => 2,
                'title' => '何でもできる',
                'good_point' => 'Chat workやSkypeなどと比べ何よりも長けているところは、外部ツールとのAPI連携の部分です。様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 5,
                'created_at' => new DateTime('2021-04-08 12:02:25'),
                'updated_at' => new DateTime('2021-04-08 12:02:25'),
            ],
            [
                'application_id' =>  3,
                'user_id' => 1,
                'title' => '多機能で最高',
                'good_point' => '様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。外部ツールとのAPI連携の部分です。様々なソリューションと組み合わせて使える利便性がいいです。UIも分かりやすいので直感的に作業可能です。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'application_id' =>  4,
                'user_id' => 2,
                'title' => 'チームのタスク管理はこれ',
                'good_point' => 'プロジェクトごと、またチームごとにタスク管理をすることができること、またタイムラインの設定や、そこからガントチャートに落とすことなど、便利な機能が多い。',
                'improvement_point' => '特段ありません。その他ツールとはまた違った良さがありますが、通常チャットツールと比べて全体的な見栄えはちょっとごちゃっとした間があるくらいですが、慣れたらむしろスマートでいいように感じました。',
                'evaluation' => 4,
                'created_at' => new DateTime('2021-04-08 22:02:21'),
                'updated_at' => new DateTime('2021-04-08 22:02:21'),
            ],
            [
                'application_id' =>  5,
                'user_id' => 1,
                'title' => '個人的には使いにくい',
                'good_point' => 'チャットツールとして一通りの機能がある。デザインがかっこいい',
                'improvement_point' => '動作が重く、使いづらさを感じます。個人的にはあまり使いたくありません、、。Slackの方が好き',
                'evaluation' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'application_id' =>  6,
                'user_id' => 1,
                'title' => '個人的には使いにくい',
                'good_point' => 'これまでもいくつかのオンライン会議ツールを利用してきましたが、ZOOMが「音声品質」・「画面共有の画質」が他のツールよりも優れていると思います。',
                'improvement_point' => '特に改善して頂きたいポイントはございませんが、利用ユーザ増えても現在の品質を維持して頂ければと思います。',
                'evaluation' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
