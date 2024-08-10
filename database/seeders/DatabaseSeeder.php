<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TopicSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\TopicCategorySeeder;
use Database\Seeders\PostSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TopicSeeder::class,
            TopicCategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
