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

    public function getAll():LengthAwarePaginator
    {
        return $this->getModel()->paginate(3);
    }

    public function getActiveNews()
    {
        return $this->getModel()->active()->get();
    }

}
