<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * Aqui lo que quise es añadir el paginardor registrando los código de Bootstrap
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
