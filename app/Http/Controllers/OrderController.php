<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class OrderController extends Controller
{
    public function index(): View
    {
        return view('order.index');
    }

    public function store(Request $request)
    {
        return response()->json($request->only('name', 'phone', 'email', 'message' ));
    }

}
