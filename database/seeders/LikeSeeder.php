<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'post_id' => 1,
                'user_id' => 1
            ],
        ]);
    }
}
