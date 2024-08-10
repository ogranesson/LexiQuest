<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'content' => 'I really want to learn Norwegian!',
                'user_id' => 1,
                'topic_id' => 1002345
            ],
            [
                'content' => 'prolly arabic... sounds cool',
                'user_id' => 3,
                'topic_id' => 1002345
            ],
            [
                'content' => 'I really want to go to China!',
                'user_id' => 1,
                'topic_id' => 1005678
            ],
            [
                'content' => 'prolly the most serene republic of san marino... sounds cool',
                'user_id' => 3,
                'topic_id' => 1005678
            ],
        ]);
    }
}
