<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class IndexController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function __invoke(Request $request):View
    {
        dd($request->all());
        return \view('admin.news');
    }
}

