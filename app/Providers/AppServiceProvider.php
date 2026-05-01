<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FileManagementService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FileManagementService::class, function ($app) {
            return new FileManagementService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}