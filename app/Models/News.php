<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{

    public function addNews($news): int
    {
        return DB::table('news')->insertGetID([
            'category_id' => $news['category_id'],
            'title' => $news['title'],
            'text' => $news['text']
        ]);
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Categories::class);
    }
}
