<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
                'post_id' => '1',
                'place_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('routes')->insert([
                'post_id' => '1',
                'place_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('routes')->insert([
                'post_id' => '1',
                'place_id' => '3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('routes')->insert([
                'post_id' => '2',
                'place_id' => '4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('routes')->insert([
                'post_id' => '3',
                'place_id' => '5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('routes')->insert([
                'post_id' => '3',
                'place_id' => '6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
