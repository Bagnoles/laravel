<?php

namespace App\Jobs;

use App\Models\Categories;
use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobNewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $link;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $link)
    {
        $this->link=$link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Parser $parser)
    {
        $data = $parser->setLink($this->link)->saveParseData();

        $linkElements = explode('/', $this->link);
        $categorySlug = end($linkElements);


        $category = Categories::firstOrCreate([
            'slug' => $categorySlug
        ], [
            'name' => $data['description']
        ]);


        foreach ($data['news'] as $item) {
            News::firstOrCreate([
                'category_id' => $category['id'],
                'title' => $item['title'],
                'text' => $item['description'],
                'pubDate' => $item['pubDate']
            ]);
        }

    }
}
