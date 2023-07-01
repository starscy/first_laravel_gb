<?php
declare(strict_types=1);

namespace App\Providers;

use App\Queries\CategoryQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\SourceQueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryBuilder::class, CategoryQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, SourceQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
