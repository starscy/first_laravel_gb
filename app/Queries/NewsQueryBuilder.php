<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsQueryBuilder extends QueryBuilder
{

    public function getModel(): Builder
    {
        return News::query();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->paginate(10);
    }

    public function getActiveNews() : LengthAwarePaginator
    {
        return $this->getModel()->active();
    }

    public function getTitleFilter($title): LengthAwarePaginator
    {
        return $this->getModel()->where('title', 'like', "%{$title}%")->paginate(QueryBuilder::TEN);
    }

    public function getSourceFilter($id): LengthAwarePaginator
    {
        return $this->getModel()->where('source_id', '=', $id)->paginate(QueryBuilder::TEN);
    }



}
