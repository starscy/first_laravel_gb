<?php
declare(strict_types=1);

namespace App\Services\news;

use App\Models\News;
use App\Services\contracts\StoreService;

class NewsService implements StoreService
{

    public function store($data): bool
    {
        $categories = $this->getCategory($data);

        $news = News::create($data);

        return $news && $news->categories()->attach($categories);
    }

    public function update(News $news, $data): bool
    {
        $categories = $this->getCategory($data);

        return $news->update($data) && $news->categories()->sync($categories);

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
