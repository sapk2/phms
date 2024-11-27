<?php

namespace App\Providers;

use App\Models\site_setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $settings = site_setting::first();
        $footer = site_setting::first();
        view()->share('settings', $settings);
        view()->share('footer', $footer);
    }
}
