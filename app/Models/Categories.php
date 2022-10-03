<?php

namespace App\Models;

class Categories
{
    private array $categories = [
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
        ],
    ];

    public function getCategories(): array
    {
        return $this->categories;
    }


    public function getCategoryIdBySlug($slug)
    {
        $id = null;
        foreach ($this->getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

}
