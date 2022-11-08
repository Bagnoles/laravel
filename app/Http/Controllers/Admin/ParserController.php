<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\Source;



class ParserController extends Controller
{
    public function index()
    {

        foreach (Source::all() as $item) {
            dispatch(new JobNewsParsing($item['link']));
        }

        return '
        Parsing completed! <br> <a href="/admin">В админку</a>
        ';

    }
}
