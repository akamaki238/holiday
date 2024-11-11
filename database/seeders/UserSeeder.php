<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->insert([
                'name' => '太郎',
                'email' => 'abc@abc',
                'password' => Hash::make('abc123'),
                'remember_token' => Str::random(60),
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
                'remember_token' => Str::random(60),
                'mbti' => 'INTP',
                'introduction' => '30歳の男性です',
                'hometown' => '茨城',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
