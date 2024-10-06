<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DateTime;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->insert([
                'user_id' => '1',
                'post_id' => '1',
                'comment' => '楽しそうですね',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('comments')->insert([
                'user_id' => '1',
                'post_id' => '1',
                'comment' => '近くに美味しいお店はありましたか？',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
