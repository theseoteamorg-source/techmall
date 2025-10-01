<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SitemapService;

class SitemapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('sitemap', function () {
            return new SitemapService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
