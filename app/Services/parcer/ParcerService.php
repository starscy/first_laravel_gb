<?php
declare(strict_types=1);

namespace App\Services\parcer;

use App\Models\News;
use App\Services\contracts\Parcer;

class ParcerService implements Parcer
{
    private string $link;
    public function setLink(string $link):self
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData():void
    {
        $xml = \Orchestra\Parser\Xml\Facade::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'group_description' => [
                'uses' => 'channel.description',
            ],
            'image' => [
                'uses' => 'channel.image.url'],
            'news' => [
                'uses' => 'channel.item[title,pubDate,description,pdalink,author]'
            ],
        ]);

        //do later
    }
}
