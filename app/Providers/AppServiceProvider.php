<?php
declare(strict_types=1);

namespace App\Providers;

use App\Queries\CategoryQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\SourceQueryBuilder;
use App\Queries\UserQueryBuilder;
use App\Services\contracts\Parcer;
use App\Services\contracts\StoreService;
use App\Services\news\NewsService;
use App\Services\parcer\ParcerService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, CategoryQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, SourceQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, UserQueryBuilder::class);

        //Services

        $this->app->bind(Parcer::class, ParcerService::class );
        $this->app->bind(StoreService::class, NewsService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor/pagination/bootstrap-5');
    }
}
