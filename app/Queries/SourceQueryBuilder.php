<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;

class SourceQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Source::query();
    }

}
