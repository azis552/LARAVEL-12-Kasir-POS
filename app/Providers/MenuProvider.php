<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuProvider extends ServiceProvider
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
        View::composer('template.sidebar', function ($view) {
            $menus = Menu::with('children')
            ->whereNull('parent_id')
            ->get();
            $view->with('menus', $menus);
        });
    }
}
