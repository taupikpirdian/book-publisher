<?php

namespace App\Providers;

use App\Models\AboutPage;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
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
        // Share AboutPage data globally for footer
        View::composer('*', function ($view) {
            $aboutPage = AboutPage::where('is_active', true)->first();
            $view->with('footerData', $aboutPage);
        });

        // Share Settings globally for all views
        View::composer('*', function ($view) {
            $settings = Setting::getActive();
            $view->with('settings', $settings);
        });
    }
}
