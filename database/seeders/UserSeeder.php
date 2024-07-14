<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => '太郎',
                'email' => 'abc@abc',
                'password' => Hash::make('abc123'),
                'mbti' => 'INTP',
                'introduction' => '20歳の男性です',
                'hometown' => '鹿児島',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('users')->insert([
                'name' => '次郎',
                'email' => 'def@def',
                'password' => Hash::make('def123'),
                'mbti' => 'INTP',
                'introduction' => '30歳の男性です',
                'hometown' => '茨城',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        //
    }
}
