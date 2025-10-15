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
            $roleId = auth()->user()->role_id;
            // Ambil menu berdasarkan role
            $menus = Menu::with('children')
                ->whereNull('parent_id')
                ->whereHas('roles', function ($query) use ($roleId) {
                    $query->where('roles.id', $roleId);
                })
                ->get();
            $view->with('menus', $menus);
        });
    }
}
