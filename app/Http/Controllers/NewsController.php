<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use App\Models\News;
use App\Queries\CategoryQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Contracts\View\View;

final class NewsController extends Controller
{
    protected QueryBuilder $categoryQueryBuilder ;
    protected QueryBuilder $newsQueryBuilder;

    public function __construct (
        CategoryQueryBuilder $categoryQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder
    ) {
        $this->categoryQueryBuilder = $categoryQueryBuilder;
        $this->newsQueryBuilder = $newsQueryBuilder;
    }
    public function index(): View
    {
        return view('news.index', ['news' => $this->newsQueryBuilder->getActiveNews()]);

    }

    public function show(News $news): View
    {
        return view('news.show', ['newsItem' => $news]);
    }
}
