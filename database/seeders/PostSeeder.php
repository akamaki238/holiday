<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                'user_id' => '1',
                'introduction' => '友達と遊ぶ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('posts')->insert([
                'user_id' => '1',
                'introduction' => '家族と遊ぶ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('posts')->insert([
                'user_id' => '2',
                'introduction' => '友達と遊ぶ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
