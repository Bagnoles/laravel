<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Categories extends Model
{
    protected $fillable = ['slug', 'name'];

    public function addCategory($category): int
    {
        return DB::table('categories')->insertGetID([
            'name' => $category['name'],
            'slug' => $category['slug']
        ]);
    }

    public function news(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }

}
