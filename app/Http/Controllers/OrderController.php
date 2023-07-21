<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ParserController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class OrderController extends Controller
{
    public function index(): View
    {
        $parse = new ParserController();


        return view('order.index');
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json($request->only('name', 'phone', 'email', 'message'));
    }

}
