<?php
declare(strict_types=1);

namespace App\Helper;

use App\Models\News;


class UpdateImagesNews
{
    public function index():void
    {
        $news = News::all();

        foreach ($news as & $item) {
            $item['image'] = 'assets/dino/images/dinosaurs/' . lcfirst(TranslateToSlug::translit($item['title'])) .'.jpg';
            News::where('id', $item->id)->update(['image' => $item['image']]);
        }

    }
}
