<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Establecer el locale en español
        \Carbon\Carbon::setLocale('es');
        
        // Establecer la zona horaria global para la aplicación
        config(['app.timezone' => 'America/Bogota']);
    }
}
