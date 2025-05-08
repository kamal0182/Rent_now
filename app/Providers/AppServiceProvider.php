<?php

namespace App\Providers;

use App\Models\Rental;

use App\Repositories\Concrats\CategorieRepositoryInterface;
use App\Repositories\Concrats\CommentRepositoryInterface as ConcratsCommentRepositoryInterface;
use App\Repositories\Concrats\LocationRepositoryInterface;
use App\Repositories\Concrats\ProductRepositoryInterface;
use App\Repositories\Concrats\RentalRepositoryInterface;
use App\Repositories\Concrats\RentalWayRepositoryInterface;
use App\Repositories\Concrats\UserRepositoryInterface;
use App\Repositories\Eloquent\CategorieRepository;
use App\Repositories\Eloquent\CommentRepository as EloquentCommentRepository;
use App\Repositories\Eloquent\LocationRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\RentalRepository as EloquentRentalRepository;
use App\Repositories\Eloquent\RentWayRepository;
use App\Repositories\Eloquent\UserRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            \App\Repositories\Concrats\RoleRepositoryInterface::class,
            \App\Repositories\Eloquent\RoleRepository::class
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            CategorieRepositoryInterface::class,
            CategorieRepository::class
        );


        $this->app->bind(
            RentalRepositoryInterface::class,
            EloquentRentalRepository::class
        );
        $this->app->bind(
            RentalWayRepositoryInterface::class,
            RentWayRepository::class
        );
        $this->app->bind(
            LocationRepositoryInterface::class,
            LocationRepository::class
        );
        $this->app->bind(
            ConcratsCommentRepositoryInterface::class,
            EloquentCommentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
