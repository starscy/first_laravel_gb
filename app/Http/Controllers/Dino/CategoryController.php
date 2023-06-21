<?php

namespace App\Http\Controllers\Dino;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    static public array $category = [
        'new' => ['name' => 'новые'],
        'popular' => ['name' => 'популярные'],
        'sport' => ['name' =>'спорт'],
        'criminal' => ['name' =>'криминал'],
        'humor' => ['name' => 'юмор']
    ];

    public function category ()
    {
        $html = '<h1>Категории новостей</h1>';

        foreach (self::$category as $key => $catItem) {
            $nameRoute = route('news', $key);
//            $nameRoute = route('categoryDetail', $key);
            $html .= "<a href='". $nameRoute ."'>{$catItem['name']}</a><br>";
        }

        return $html;
    }

    public function categoryDetail ($code)
    {
        $categoryAr = $this->getByCode($code);
        $html = "<h1>Рубрика - ". $categoryAr['name'] ." .Новости</h1>";

        return $html;

    }

    static public function getByCode ($code)
    {
        foreach (self::$category as $key => $catItem) {
            if ($key === $code) return $catItem;
        }
        return [];
    }
}
