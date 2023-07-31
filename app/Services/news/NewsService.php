<?php
declare(strict_types=1);

namespace App\Services\news;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Services\contracts\StoreService;
use Illuminate\Support\Facades\DB;

class NewsService implements StoreService
{
    public function store(array $data): News|string
    {
        try {
            Db::beginTransaction();

            $source = $this->cutSource($data);
            $sourceId = gettype($source) === 'string' ? $source : $this->getSourceId($source);
            $data['source_id'] = $sourceId;

            $categories = $this->cutCategories($data);
            $categoryIds = $this->getCategoryIds($categories);

            $news = News::create($data);
            $news->categories()->sync($categoryIds);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        return $news;
    }

    public function update(News $news, array $data): News|string
    {
        try {
            Db::beginTransaction();

            $categories = $this->cutCategories($data);
            $categoryIds = $this->getCategoryIdsWithUpdate($categories);

            $source = $this->cutSource($data);
            $sourceId = gettype($source) === 'string' ? $source : $this->getSourceIdWithUpdate($source);
            $data['source_id'] = $sourceId;

            $news->update($data);
            $news->categories()->sync($categoryIds);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        return $news;
    }

    protected function cutCategories(array &$data): array
    {
        $categories = [];
        if (!empty($data['categories'])) {
            $categories = $data['categories'];
            unset($data['categories']);
        }

        return $categories;
    }

    protected function cutSource(array &$data): array|string
    {
        $source = '';
        if (isset($data['source_id'])) {
            $source = $data['source_id'];
            unset($data['source_id']);
        }

        return $source;
    }

    protected function getCategoryIds(array $categories): array
    {
        $categoriesIds = [];

        foreach ($categories as $category) {
            if (gettype($category) === 'string') {
                $tag = Category::find($category);
            } else {
                isset($category['id']) ?
                    $tag = Category::find($category['id']) :
                    $tag = Category::create($category);
            }
            $categoriesIds[] = $tag->id;
        }

        return $categoriesIds;
    }

    protected function getCategoryIdsWithUpdate(array $categories): array
    {
        $categoriesIds = [];

        foreach ($categories as $category) {
            $tag = '';
            if (gettype($category) === 'string') {
                $currentCategory = Category::find($category);
                $currentCategory->update($category);
                $tag = $currentCategory->fresh();
            }
            if (!isset($category['id'])) {
                $tag = Category::create($category);
            } else {
                $currentCategory = Category::find($category['id']);
                $currentCategory->update($category);
                $tag = $currentCategory->fresh();
            }
            $categoriesIds[] = $tag->id;
        }

        return $categoriesIds;
    }

    protected function getSourceId(array $source): int
    {
        $source = isset($source['id']) ? Source::find($source['id']) : Source::create($source);

        return $source->id;
    }

    protected function getSourceIdWithUpdate($source): int
    {
        if (!isset($source['id'])) {
            $source = Source::create($source);
        } else {
            $currentSource = Source::find($source['id']);
            $currentSource->update($source);
            $source = $currentSource->fresh();
        }

        return $source->id;
    }
}
