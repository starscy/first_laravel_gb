<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Services\contracts\Parcer;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    public function __invoke(Request $request, Parcer $parcer): void
    {
        $urlArr = [
            'https://news.rambler.ru/rss/world',
            'https://news.rambler.ru/rss/community',
            'https://news.rambler.ru/rss/incidents',
            'https://news.rambler.ru/rss/tech',
            'https://news.rambler.ru/rss/games',
            'https://news.rambler.ru/rss/starlife',
            'https://news.rambler.ru/rss/army',
            'https://news.rambler.ru/rss/moscow_city'
        ];

        foreach ($urlArr as $url) {
            dispatch(new NewsParsingJob($url));
        }
    }
}
