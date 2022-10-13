<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Политика',
                'slug' => 'politics'
            ],
            [
                'id' => 2,
                'name' => 'Экономика',
                'slug' => 'economy'
            ],
            [
                'id' => 3,
                'name' => 'Спорт',
                'slug' => 'sport'
            ],
            [
                'id' => 4,
                'name' => 'Медицина',
                'slug' => 'medicine'
            ],
            [
                'id' => 5,
                'name' => 'Наука',
                'slug' => 'science'
            ]
        ]);
    }
}
