<?php

namespace Rozee\Providers;

use Illuminate\Support\ServiceProvider;
use Rozee\Data\Repositories\RepositoryInterface;
use Rozee\Data\Repositories\UserRepository;

class DatabaseServiceProvider extends ServiceProvider
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
        $this->app->bind(RepositoryInterface::Class,UserRepository::Class);
    }
}
