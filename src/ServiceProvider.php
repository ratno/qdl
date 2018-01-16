<?php

namespace QDL;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if(class_exists(\App\Providers\RepositoryServiceProvider::class)) {
            \App::register(\App\Providers\RepositoryServiceProvider::class);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
