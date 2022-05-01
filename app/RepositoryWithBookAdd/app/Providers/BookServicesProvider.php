<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BookInterface;
use App\Repositories\Eloquent\BookRepository;
use App\Repositories\AddCartInterface;
use App\Repositories\Eloquent\AddCartRepository;

class BookServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookInterface::class,BookRepository::class);

        $this->app->bind(AddCartInterface::class,AddCartRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
