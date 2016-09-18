<?php

namespace Sundayguru\Laravelgenerics;

use Illuminate\Support\ServiceProvider;

/**
 * 
 */
class LaravelGenericsServiceProvider extends ServiceProvider
{
    
     /**
     * Define where to render views files
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'laravelgenerics');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/laravelgenerics'),
        ]);
    }

     /**
     * Register the application service
     *
     * @return void
     */
    public function register()
    {
        $this->app['laravelgenerics'] = $this->app->share(function($app){
            return new LaravelGenerics;
        });
    }
}
