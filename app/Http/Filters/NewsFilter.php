<?php
declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class NewsFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const IMAGE = 'image';
    public const SOURCE_ID = 'source_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::IMAGE => [$this, 'image'],
            self::SOURCE_ID => [$this, 'source_id'],
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value): void
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    public function image(Builder $builder, $value): void
    {
        $builder->where('image', 'like', "%{$value}%");
    }

    public function source_id(Builder $builder, $value): void
    {
        $builder->where('source_id', 'like', "%{$value}%");
    }
}
