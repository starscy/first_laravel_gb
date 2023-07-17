<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class UserQueryBuilder extends QueryBuilder
{

    public function getModel(): Builder
    {
        return User::query();
    }

    public function getAll():LengthAwarePaginator
    {
        return $this->getModel()->paginate(3);
    }

}
