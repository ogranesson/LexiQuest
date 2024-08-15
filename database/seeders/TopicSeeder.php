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
        DB::table('topics')->insert([
            [
                'id' => 1002345,
                'name' => 'What languages do you want to learn?',
                'user_id' => 1,
                'created_on' => '2023-11-11 12:34:56'
            ],
            [
                'id' => 1002346,
                'name' => 'Where do you want to travel to?',
                'user_id' => 2,
                'created_on' => '2023-11-25 08:23:47'
            ],
            [
                'id' => 1002347,
                'name' => 'What is the most effective way to learn a new language?',
                'user_id' => 3,
                'created_on' => '2023-12-01 12:34:56'
            ],
            [
                'id' => 1002348,
                'name' => 'Which language learning apps do you recommend?',
                'user_id' => 1,
                'created_on' => '2023-12-05 08:23:47'
            ],
            [
                'id' => 1003456,
                'name' => 'What are the best places to travel to for language immersion?',
                'user_id' => 2,
                'created_on' => '2024-01-10 14:15:35'
            ],
            [
                'id' => 1004567,
                'name' => 'Is Japanese writing really as hard as people say?',
                'user_id' => 4,
                'created_on' => '2024-02-18 09:40:22'
            ],
            [
                'id' => 1005678,
                'name' => 'How do you maintain language proficiency after learning?',
                'user_id' => 6,
                'created_on' => '2024-03-03 16:30:22'
            ],
            [
                'id' => 1006789,
                'name' => 'What are the best cities in Spain to practice Spanish?',
                'user_id' => 8,
                'created_on' => '2024-03-25 17:45:33'
            ],
            [
                'id' => 1007890,
                'name' => 'What languages are most useful for business?',
                'user_id' => 5,
                'created_on' => '2024-04-10 18:22:10'
            ],
            [
                'id' => 1008901,
                'name' => 'How long does it take to become fluent in a new language?',
                'user_id' => 7,
                'created_on' => '2024-05-01 19:31:45'
            ],
            [
                'id' => 1012345,
                'name' => 'What are the benefits of learning Mandarin for business?',
                'user_id' => 9,
                'created_on' => '2024-05-15 20:15:55'
            ],
            [
                'id' => 1013456,
                'name' => 'How difficult is the Russian grammar for English speakers?',
                'user_id' => 10,
                'created_on' => '2024-06-01 21:25:10'
            ],
            [
                'id' => 1014567,
                'name' => 'What are the best resources for learning Arabic script?',
                'user_id' => 2,
                'created_on' => '2024-06-18 22:34:26'
            ],
            [
                'id' => 1015678,
                'name' => 'Is it better to learn one language at a time or multiple?',
                'user_id' => 4,
                'created_on' => '2024-06-30 10:12:34'
            ],
            [
                'id' => 1016789,
                'name' => 'What strategies do you use to memorize vocabulary in German?',
                'user_id' => 12,
                'created_on' => '2024-07-05 14:05:20'
            ],
            [
                'id' => 1017890,
                'name' => 'How can I practice speaking French before traveling to Paris?',
                'user_id' => 6,
                'created_on' => '2024-07-15 09:45:12'
            ],
            [
                'id' => 1018901,
                'name' => 'What are some common mistakes Spanish learners make?',
                'user_id' => 8,
                'created_on' => '2024-07-22 16:33:56'
            ],
            [
                'id' => 1023456,
                'name' => 'Come posso migliorare il mio italiano parlato?',
                'user_id' => 9,
                'created_on' => '2024-07-30 12:14:45'
            ],
            [
                'id' => 1024567,
                'name' => 'What is the best age to start learning a new language?',
                'user_id' => 5,
                'created_on' => '2024-08-05 18:55:30'
            ],
            [
                'id' => 1025678,
                'name' => 'Can you learn a language through watching movies and TV shows?',
                'user_id' => 7,
                'created_on' => '2024-08-08 20:34:21'
            ],
            [
                'id' => 1026789,
                'name' => 'What are the best books for learning Japanese?',
                'user_id' => 13,
                'created_on' => '2024-08-11 11:22:50'
            ],
            [
                'id' => 1027890,
                'name' => 'How can I improve my pronunciation in Chinese tones?',
                'user_id' => 10,
                'created_on' => '2024-08-14 14:54:32'
            ],
            [
                'id' => 1031234,
                'name' => '¿Cuáles son las mejores maneras de aprender español rápido?',
                'user_id' => 4,
                'created_on' => '2024-08-18 09:15:21'
            ],
            [
                'id' => 1032345,
                'name' => 'Qual è la difficoltà principale nell\'imparare il francese?',
                'user_id' => 11,
                'created_on' => '2024-08-20 10:32:11'
            ],
            [
                'id' => 1033456,
                'name' => 'Why is mastering Japanese kanji considered difficult?',
                'user_id' => 2,
                'created_on' => '2024-08-22 11:45:56'
            ],
            [
                'id' => 1034567,
                'name' => 'What are the best travel destinations for learning Portuguese?',
                'user_id' => 3,
                'created_on' => '2024-08-25 13:22:19'
            ],
            [
                'id' => 1035678,
                'name' => '日本語を学ぶ際の最大の課題は何ですか？',
                'user_id' => 8,
                'created_on' => '2024-08-28 14:05:38'
            ],
            [
                'id' => 1036789,
                'name' => 'How can I improve my writing skills in Arabic?',
                'user_id' => 9,
                'created_on' => '2024-08-30 15:15:50'
            ],
            [
                'id' => 1037890,
                'name' => 'Che cosa rende il tedesco così difficile da imparare?',
                'user_id' => 5,
                'created_on' => '2024-09-02 16:45:30'
            ],
            [
                'id' => 1038901,
                'name' => 'Is it beneficial to learn a language before traveling?',
                'user_id' => 7,
                'created_on' => '2024-09-04 17:33:21'
            ],
            [
                'id' => 1041234,
                'name' => 'What are some tips for learning Korean quickly?',
                'user_id' => 10,
                'created_on' => '2024-09-06 18:22:44'
            ],
            [
                'id' => 1042345,
                'name' => 'What are the differences between Castilian Spanish and Latin American Spanish?',
                'user_id' => 4,
                'created_on' => '2024-09-08 19:05:55'
            ],
            [
                'id' => 1043456,
                'name' => 'Qual è il miglior metodo per imparare una lingua in età adulta?',
                'user_id' => 6,
                'created_on' => '2024-09-10 20:45:11'
            ]
        ]);
    }
}
