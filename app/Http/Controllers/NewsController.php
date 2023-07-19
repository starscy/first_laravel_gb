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
    public function __construct(
        protected CategoryQueryBuilder $categoryQueryBuilder,
        protected NewsQueryBuilder     $newsQueryBuilder
    )
    {
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
