<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function renderAddForm(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $new = $request->except('_token');
            $id = $news->addNews($new);
            $category = Categories::query()->where('id', $new['category_id'])->first();
            $path = '/news/' . $category['slug'] . '/' . $id;
            return redirect($path);
        }

        return view('admin.addNews', [
            'categories' => Categories::all()
        ]);
    }

    public function downloadNews(Categories $categories, Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            return response()->json(News::query()->where('category_id', $request->input('category_id'))->get())
                ->header('Content-Disposition', 'attachment; filename = "json.txt"')
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        return view('admin.download', [
            'categories' => Categories::all()
        ]);
    }

    public function showCategoriesList()
    {
        return view('admin.categoriesList')->with('categories', Categories::all());
    }

    public function showNewsList()
    {
        return view('admin.newsList')->with('news', DB::table('news')->paginate(10));
    }

    public function addCategory(Request $request, Categories $categories)
    {
        if ($request->isMethod('post')) {
            $newCategory = $request->except('_token');
            $categories->addCategory($newCategory);
            return redirect('/news');
        }

        return view('admin.addCategory');
    }

    public function editCategory($id, Request $request) {
        if ($request->isMethod('post')) {
            Categories::query()->where('id', $id)->update([
                'name' => $request->input('name'),
                'slug' => $request->input('slug')
            ]);
            return redirect('/news');
        }
        $category = Categories::query()->where('id', $id)->first();
        return view('admin.editCategory')->with('category', $category);
    }

    public function deleteCategory($id)
    {
        Categories::query()->where('id', $id)->delete();
        return view('admin.categoriesList')->with('categories', Categories::all());
    }

    public function editNews($id, Request $request)
    {
        if ($request->isMethod('post')) {
            News::query()->where('id', $id)->update([
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'category_id' => $request->input('category_id')
            ]);
            return redirect('/news/list');
        }
        return view('admin.editNews', [
            'categories' => Categories::all(),
            'news' => News::query()->where('id', $id)->first()
        ]);
    }

    public function deleteNews($id)
    {
        News::query()->where('id', $id)->delete();
        return redirect('/news/list');
    }
}
