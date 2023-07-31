<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\contracts\Parcer;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    public function __invoke(Request $request, Parcer $parcer): void
    {
        $url = 'https://news.rambler.ru/rss/games/';

        $parcer->setLink($url)->saveParseData();
    }
}
