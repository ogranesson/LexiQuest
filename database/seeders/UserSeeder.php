<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Violeta',
                'middle_name' => '',
                'last_name' => 'Taneva',
                'username' => 'violeta',
                'email' => 'violeta@lingua.com',
                'password' => Hash::make('password'), // Encrypting the password
                'is_admin' => true,
                'is_banned' => false,
                'photo' => 'avatars/default.png',
            ],
            [
                'first_name' => 'Matea',
                'middle_name' => '',
                'last_name' => 'Karst',
                'username' => 'matea',
                'email' => 'matea@lingua.com',
                'password' => Hash::make('password'), // Encrypting the password
                'is_admin' => false,
                'is_banned' => false,
                'photo' => 'avatars/default.png',
            ],
            [
                'first_name' => 'Ani',
                'middle_name' => 'Chhoying',
                'last_name' => 'Dolma',
                'username' => 'ani',
                'email' => 'ani@lingua.com',
                'password' => Hash::make('password'), // Encrypting the password
                'is_admin' => true,
                'is_banned' => false,
                'photo' => 'avatars/default.png',
            ],
        ]);
    }
}
