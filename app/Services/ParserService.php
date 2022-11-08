<?php


namespace App\Services;


use App\Models\Categories;
use App\Models\News;
use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{

    private string $link;

    public function setLink(string $link)
    {
        $this->link = $link;
        return $this;
    }

    public function saveParseData()
    {
        $xml = XmlParser::load($this->link);
        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'news' => [
                'uses' => 'channel.item[title,description,pubDate]'
            ]
        ]);

    }
}
