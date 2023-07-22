<?php
declare(strict_types=1);

namespace App\Services\news;

use App\Models\News;
use App\Services\contracts\StoreService;

class NewsService implements StoreService
{

    public function store($data): News|false
    {
        $categories = $this->getCategory($data);

        $news = News::create($data);

        return $news && $news->categories()->sync($categories) ?
            $news : false;
    }

    public function update(News $news, $data): News|false
    {
        $categories = $this->getCategory($data);

        return $news->update($data) && $news->categories()->sync($categories) ?
            $news->fresh() : false;
    }

    protected function getCategory(&$data): array
    {
        $categories = [];
        if (!empty($data['categories'])) {
            $categories = $data['categories'];
            unset($data['categories']);
        }

        return $categories;
    }
}
