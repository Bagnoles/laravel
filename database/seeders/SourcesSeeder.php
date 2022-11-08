<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert([
            [
                'id' => 1,
                'link' => 'https://news.rambler.ru/rss/holiday'
            ],
            [
                'id' => 2,
                'link' => 'https://news.rambler.ru/rss/gifts'
            ],
            [
                'id' => 3,
                'link' => 'https://news.rambler.ru/rss/technology'
            ],
            [
                'id' => 4,
                'link' => 'https://news.rambler.ru/rss/tech'
            ],
            [
                'id' => 5,
                'link' => 'https://news.rambler.ru/rss/politics'
            ]
        ]);
    }
}
