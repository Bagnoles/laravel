<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function showCategories(Categories $categories)
    {
        return view('news.index')->with('categories', $categories->getCategories());
    }

    public function showNewsOnCategory($category, Categories $categories, News $news)
    {
        $categoryId = $categories->getCategoryIdBySlug($category);
        return view('news.category',['news' => $news->getNewsOnCategory($categoryId), 'slug' => $category]);
    }

    public function showOneNews($category, $newsId, News $news)
    {
        return view('news.one', ['news' => $news->getOneNews($newsId), 'slug' => $category]);
    }

    public function renderAddForm()
    {
        return view('admin.addNews');
    }
}
