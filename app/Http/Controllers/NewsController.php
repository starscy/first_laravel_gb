<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

final class NewsController extends Controller
{
    public function index(): View
    {

       // $news = $newsQueryBuilder->getModel()->get();

        $news = News::all();

        return view('news.index', compact('news'));

    }

    public function show(News $news): View
    {

        //$model = app(News::class);


        return view('news.show', ['newsItem' => $news]);

    }
}
