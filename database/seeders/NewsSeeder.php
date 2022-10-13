<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create('ru_RU');

        for ($i = 0; $i < 15; $i++) {
            $data[] = [
                'category_id' => $faker->numberBetween(1, 5),
                'title' => $faker->realText(rand(10, 30)),
                'text' => $faker->realText(rand(1000, 3000))
            ];
        }
        return $data;

    }
}
