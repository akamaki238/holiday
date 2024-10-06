<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DateTime;
use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
                'follow_id' => '1',
                'followed_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('follows')->insert([
                'follow_id' => '2',
                'followed_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
