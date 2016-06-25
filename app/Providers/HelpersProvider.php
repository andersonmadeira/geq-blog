<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // esse provider só faz com que os helpers fiquem acessíveis por toda a app
        foreach (glob(app_path().'/Helpers/*.php') as $filename){
            require_once($filename);
        }
    }
}
