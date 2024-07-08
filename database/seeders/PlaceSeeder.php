<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
                'image'=>'image1.png',
                'introduction'=>'そこそこ楽しいです',
                'name'=>'A公園',
                'address'=>'A県B市',
                'latitude'=> '36.3711299846901',
                'longitude'=>'140.4762821794506',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'start_time'=>Carbon::create(2024, 6, 19, 10, 0, 0),
                'finish_time'=>Carbon::create(2024, 6, 19, 12, 0, 0),
        ]);
        DB::table('places')->insert([
                'image'=>'image2.png',
                'introduction'=>'ほどほどに楽しいです',
                'name'=>'B公園',
                'address'=>'A県B市',
                'latitude'=>'36.3654684561149',
                'longitude'=>'140.4789799957833',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'start_time'=>Carbon::create(2024, 6, 19, 13, 0, 0),
                'finish_time'=>Carbon::create(2024, 6, 19, 15, 0, 0),
        ]);
        DB::table('places')->insert([
                'image'=>'image3.png',
                'introduction'=>'まあまあ楽しいです',
                'name'=>'C公園',
                'address'=>'A県B市',
                'latitude'=>'36.38',
                'longitude'=>'140.45',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'start_time'=>Carbon::create(2024, 6, 19, 15, 30, 0),
                'finish_time'=>Carbon::create(2024, 6, 19, 17, 0, 0),
        ]);
        
        DB::table('places')->insert([
                'image'=>'image4.png',
                'introduction'=>'けっこー楽しいです',
                'name'=>'A公園',
                'address'=>'A県B市',
                'latitude'=>'36.36746410589568',
                'longitude'=>'140.4786494400074',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'start_time'=>Carbon::create(2024, 6, 19, 11, 0, 0),
                'finish_time'=>Carbon::create(2024, 6, 19, 12, 0, 0),
        ]);
        
        DB::table('places')->insert([
                'image'=>'image5.png',
                'introduction'=>'そこそこ楽しいです',
                'name'=>'A公園',
                'address'=>'A県B市',
                'latitude'=>'36.36671859106853',
                'longitude'=>'140.4683852660988',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'start_time'=>Carbon::create(2024, 6, 19, 11, 30, 0),
                'finish_time'=>Carbon::create(2024, 6, 19, 15, 30, 0),
        ]);
        DB::table('places')->insert([
                'image'=>'image6.png',
                'introduction'=>'そこそこ楽しいです',
                'name'=>'A公園',
                'address'=>'A県B市',
                'latitude'=>'36.369769787773556',
                'longitude'=>'140.47206415821051',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'start_time'=>Carbon::create(2024, 6, 19, 15, 45, 0),
                'finish_time'=>Carbon::create(2024, 6, 19, 19, 0, 0),
        ]);
    }
}
