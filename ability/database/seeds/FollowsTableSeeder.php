<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            [
                'follwer_id' =>  1,
                'followee_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  1,
                'followee_id' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  1,
                'followee_id' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  1,
                'followee_id' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  1,
                'followee_id' => 6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  2,
                'followee_id' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  2,
                'followee_id' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  2,
                'followee_id' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  2,
                'followee_id' => 6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  2,
                'followee_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  3,
                'followee_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  4,
                'followee_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  4,
                'followee_id' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'follwer_id' =>  4,
                'followee_id' => 6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
