<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class CategoryQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Category::query();
    }

}
