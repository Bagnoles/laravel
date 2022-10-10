<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function renderAddForm(Categories $categories, Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $new = $request->except('_token');
            $new['id'] = count($news->getNews()) + 1;
            $newsArray = json_decode(Storage::disk('local')->get('news.json'), true);
            $newsArray[] = $new;
            $slug = $categories->getSlugByCategoryId($new['category_id']);
            Storage::disk('local')->put('news.json', json_encode($newsArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            $path = '/news/' . $slug . '/' . $new['id'];
            return redirect($path);
        }

        return view('admin.addNews', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function downloadNews(Categories $categories, Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            return response()->json($news->getNewsOnCategory($request->input('category_id')))
                ->header('Content-Disposition', 'attachment; filename = "json.txt"')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        return view('admin.download', [
            'categories' => $categories->getCategories()
        ]);
    }
}
