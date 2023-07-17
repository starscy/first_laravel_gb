<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helper\TranslateToSlug;
use App\Http\Filters\NewsFilter;
use App\Http\Requests\News\FilterRequest;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class IndexController extends Controller
{
    public function index(FilterRequest $request): View
    {

        $data = $request->validated();

        $filter = app()->make(NewsFilter::class, ['queryParams' => array_filter($data)]);

        $news = News::filter($filter)->get();

        return view('index', compact('news'));
    }


}

