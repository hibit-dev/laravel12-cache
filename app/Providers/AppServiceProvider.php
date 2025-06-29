<?php

namespace App\Providers;

use App\Repository\TaggedUserRepositoryInterface;
use App\Repository\TaggedUserRepository;

use App\Repository\UserRepositoryInterface;
use App\Repository\UserRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TaggedUserRepositoryInterface::class, TaggedUserRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
