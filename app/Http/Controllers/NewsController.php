<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function showCategories()
    {
        $categories = News::getCategories();
        return view('news.news')->with('categories', $categories);
    }

    public function showNewsOnCategory($categoryId)
    {
        $news = News::getNewsOnCategory($categoryId);
        return view('news.newsCategory')->with('news', $news);
    }

    public function showOneNews($categoryId, $newsId)
    {
        $news = News::getOneNews($newsId);
        $category = News::getCategory($categoryId);
        return view('news.newsOne', ['news' => $news, 'category' => $category]);
    }

    public function renderAddForm()
    {
        return view('news.addNews');
    }
}
