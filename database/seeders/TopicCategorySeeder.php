<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('topic_categories')->insert([
            [
                'topic_id' => 1002345,
                'category_id' => 1
            ],
            [
                'topic_id' => 1002345,
                'category_id' => 2
            ],
            [
                'topic_id' => 1005678,
                'category_id' => 1
            ],
            [
                'topic_id' => 1005678,
                'category_id' => 2
            ],
        ]);
    }
}
