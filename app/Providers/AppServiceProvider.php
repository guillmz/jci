<?php

namespace App\Providers;

use App\Linea;
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
        $data = Linea::all();
        $countLines = Linea::count();

        view()->share('data', $data);
        view()->share('countLines', $countLines);
    }
}
