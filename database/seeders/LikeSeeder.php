<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DateTime;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    public function run()
    {
        DB::table('likes')->insert([
                'user_id' => '1',
                'post_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('likes')->insert([
                'user_id' => '2',
                'post_id' => '1',
                'updated_at' => new DateTime(),
        ]);
    }
}
