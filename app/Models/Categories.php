<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Categories
{
    /*
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
    ]; */

    public function getCategories(): array
    {
        return DB::select('SELECT * FROM categories');
    }


    public function getCategoryIdBySlug($slug)
    {
       /* $id = null;
        foreach ($this->getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }*/
        return DB::selectOne('SELECT id FROM categories WHERE slug = :slug', ['slug' => $slug]);

    }

    public function getSlugByCategoryId($id)
    {
       /* $slug = '';
        foreach ($this->getCategories() as $category) {
            if ($category['id'] == $id) {
                $slug = $category['slug'];
                break;
            }
        }
        return $slug; */
        return DB::selectOne('SELECT slug FROM categories WHERE id = :id', ['id' => $id]);
    }

}
