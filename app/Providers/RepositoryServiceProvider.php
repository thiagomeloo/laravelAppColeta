<?php

namespace App\Providers;

use EloquentORM;
use Illuminate\Cache\Repository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(RepositoryInterface::class, EloquentORM::class);
    }
}
