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
        $this->app->singleton(\Illuminate\Session\SessionManager::class, function () {
            return $this->app->loadComponent('session', \Illuminate\Session\SessionServiceProvider::class, 'session');
        });

        $this->app->singleton('session.store', function () {
            return $this->app->loadComponent('session', \Illuminate\Session\SessionServiceProvider::class, 'session.store');
        });

        if ($this->app->environment('local')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
