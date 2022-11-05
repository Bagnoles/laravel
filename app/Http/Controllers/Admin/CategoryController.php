<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategoriesList()
    {
        return view('admin.categoriesList')->with('categories', Categories::all());
    }

    public function addCategory(Request $request, Categories $categories)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => ['required', 'string', 'min:3', 'max:100'],
                'slug' => ['required', 'string', 'min:3', 'max:100']
            ]);
            $newCategory = $request->except('_token');
            $categories->addCategory($newCategory);
            return redirect('/news');
        }

        return view('admin.addCategory');
    }

    public function editCategory($id, Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => ['required', 'string', 'min:3', 'max:100'],
                'slug' => ['required', 'string', 'min:3', 'max:100']
            ]);
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

}

