<?php

declare(strict_types=1);

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class QueryBuilder
{
    abstract public function getModel(): Builder;

    abstract public function getAll(): LengthAwarePaginator;

    public const TWENTY = 20;
    public const TEN = 10;

}
