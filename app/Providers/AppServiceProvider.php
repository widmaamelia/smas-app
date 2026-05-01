<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FileManagementService;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        $this->app->bind(FileManagementService::class, function ($app) {
            return new FileManagementService();
        });
    }

    
    public function boot(): void
    {
        //
    }
}