<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Application repositories
     *
     * @var array
     */
    protected $repositories = [
        'UserRepository' => 'UserRepositoryContract',
        'ApplicationRepository' => 'ApplicationRepositoryContract',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $repository => $contract) {
            $this->app->bind('App\Repositories\\'.$repository, 'App\Repositories\Contracts\\'.$contract);
        }
    }
}
