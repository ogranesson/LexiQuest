<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Topic;


class TopicSeeder extends Seeder
{
    public function run(): void
    {
        Topic::create([
            'id' => 1002345,
            'name' => 'What languages do you want to learn?',
            'user_id' => 1,
        ]);
        
        Topic::create([
            'id' => 1005678,
            'name' => 'Where do you want to travel to?',
            'user_id' => 2,
        ]);
    }
}
