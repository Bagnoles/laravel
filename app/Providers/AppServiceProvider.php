<?php

namespace App\Providers;

use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        // Paginator::useBootstrapFour();
    }
}
