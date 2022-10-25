<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    public function renderAddForm(Request $request, News $news)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => ['required', 'string', 'min:5', 'max:150'],
                'text' => ['required', 'string', 'min:10', 'max:2000'],
                'category_id' => ['required', 'exists:categories,id']
            ]);
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

    public function showNewsList()
    {
        return view('admin.newsList')->with('news', DB::table('news')->paginate(10));
    }

    public function editNews($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => ['required', 'string', 'min:5', 'max:150'],
                'text' => ['required', 'string', 'min:10', 'max:2000'],
                'category_id' => ['required', 'exists:categories,id']
            ]);
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
