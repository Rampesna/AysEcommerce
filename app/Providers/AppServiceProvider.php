<?php

namespace App\Providers;

use App\Http\View\Composers\AuthenticatedComposer;
use App\Http\View\Composers\CategoriesComposer;
use App\Http\View\Composers\OptionsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AuthenticatedComposer::class);
        View::composer('*', OptionsComposer::class);
        View::composer('*', CategoriesComposer::class);
    }

    protected function loadHelpers()
    {
        foreach (glob(__DIR__ . '/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
