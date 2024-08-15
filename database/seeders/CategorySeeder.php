<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Languages'
            ],
            [
                'name' => 'Learning resources'
            ],
            [
                'name' => 'Conversations'
            ],
            [
                'name' => 'Trivia'
            ],
            [
                'name' => 'Grammar'
            ],
            [
                'name' => 'Proficiency'
            ],
            [
                'name' => 'Italian / Italiano'
            ],
            [
                'name' => 'French / Français'
            ],
            [
                'name' => 'Spanish / Español'
            ],
            [
                'name' => 'Japanese / 日本語'
            ],
        ]);
    }
}
