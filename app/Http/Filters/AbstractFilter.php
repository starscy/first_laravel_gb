<?php
declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    private $queryParams = [];

    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    abstract protected function getCallbacks(): array;

    public function apply(Builder $builder): void
    {
        $this->before($builder);

        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    protected function before(Builder $builder): void
    {
    }

    protected function getQueryParam(string $key, $default = null): string|null
    {
        return $this->queryParams[$key] ?? $default;
    }


    protected function removeQueryParam(string ...$keys): AbstractFilter
    {
        foreach ($keys as $key) {
            if ($this->queryParams[$key]) {
                unset($this->queryParams[$key]);
            }
        }

        return $this;
    }
}
