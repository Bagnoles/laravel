<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;


class NewsController extends Controller
{
    public function showCategories()
    {
        $categories = Categories::all()->toArray();
        return view('news.index')->with('categories', $categories);
    }

    public function showNewsOnCategory($categorySlug)
    {
        $news = Categories::query()->where('slug', $categorySlug)->first()->news;
        return view('news.category',[
            'news' => $news,
            'slug' => $categorySlug
        ]);
    }

    public function showOneNews($category, $newsId)
    {
        $news = News::query()->where('id', $newsId)->first();
        return view('news.one', [
            'news' => $news,
            'slug' => $category
        ]);
    }
}
