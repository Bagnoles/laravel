<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ParserController extends Controller
{
    public function index(Parser $parser)
    {
        // politics economics science

        $data = $parser->setLink('https://news.mail.ru/rss/sport/90/')->getParseData();


        foreach ($data['news'] as $item) {
            DB::table('news')->insert([
                'category_id' => 3,
                'title' => $item['title'],
                'text' => $item['description'],
                'pubDate' => $item['pubDate']
            ]);
        }

        return redirect('/news');

    }
}
