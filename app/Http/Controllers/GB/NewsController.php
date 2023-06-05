<?php

namespace App\Http\Controllers\GB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private array $news = [

    ];
    public function generateNews($sort='new')
    {
        for ($i=1;$i<21;$i++) {
            $this->news[] = [
                'id' => (string)$i,
                'title' => 'Новость ' . $i,
                'description' => 'Описание новости ' . $i,
                'sort' => $sort,
            ];
        }

        return $this->news;
    }

    public function news ($sort = 'news')
    {
        if(empty($this->news)) {
            self::generateNews($sort);
        }

        $category = CategoryController::getByCode($sort);

        $html = '<h1>Новости. '.$category['name'].'</h1>';

        foreach ($this->news as $news) {
            $nameRoute = route('newsDetail', [$sort, $news['id']] );
            $html .= '<h3><a href="' . $nameRoute . '">'. $news['title'] . '</a></h3><hr>';//не красиво
        }

        return $html;
    }

    public function newsDetail ($category, $id)
    {
        if(empty($this->news)) {
           $sortNews =  self::generateNews($category);
        }
        $news = $this->getNewsById($id);

        $nameRoute = route('category');

        $html = '';

        if(!empty($news)) {
            $html = "<h1>{$news['title']}</h1>
            <h3>{$news['description']}</h3>
            <hr><a href='".$nameRoute."'>Назад</a>";

            return $html;
        }

        return redirect($nameRoute);
    }


    protected function getNewsById ($id)
    {
        foreach ($this->news as $news) {
            if ($news['id'] === $id) return $news;
        }
        return [];
    }
}
