<?php

namespace Simpeg\Providers;

use Illuminate\Support\ServiceProvider;
use Simpeg\Services\Widget\Menu\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton("menu", function() {
            return new Menu;
        });
    }
}
