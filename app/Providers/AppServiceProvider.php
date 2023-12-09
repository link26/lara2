<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Page;
use App\Observers\PageObserver;

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
        // Регистрация наблюдателя для модели Page
        Page::observe(PageObserver::class);

        // Создание глобального View Composer
        View::composer('*', function ($view) {
            $menuPages = Page::where('visible', 1)
                ->where('menu_type', 1)
                ->get();
            $view->with('menuPages', $menuPages);
        });
    }

}
