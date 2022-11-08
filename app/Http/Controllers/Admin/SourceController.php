<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SourceController extends Controller
{
    public function showSources()
    {
        return view('admin.sources')->with('sources', Source::all());
    }

    public function addSource(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'link' => ['required', 'string', 'min:10', 'max:150']
            ]);
            $item = $request->except('_token');
            DB::table('sources')->insert([
                'link' => $item['link']
            ]);
            return redirect('/admin/sources');
        }
        return view('admin.addSource');
    }

    public function deleteSource($id)
    {
        Source::query()->where('id', $id)->delete();
        return redirect('/admin/sources');
    }
}
