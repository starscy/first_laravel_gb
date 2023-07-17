<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SourceQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Source::query();
    }

    public function getAll():Collection
    {
        return $this->getModel()->get();
    }
}
