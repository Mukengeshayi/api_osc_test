<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Article\ArticleContract;
use App\Repository\Article\ArticleRepo;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ArticleContract::class, ArticleRepo::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
