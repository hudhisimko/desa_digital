<?php

namespace App\Providers;

use App\Interfaces\EventRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\HeadOfFamilyRepositoryInterface;
use App\Interfaces\FamilyMemberRepositoryInterface;

use App\Repositories\EventRepository;
use App\Repositories\UserRepository;
use App\Repositories\HeadOfFamilyRepository;
use App\Repositories\FamilyMemberRepository;

use Illuminate\Support\ServiceProvider;

use App\Repositories\UserRepository;
use App\Repositories\HeadOfFamilyRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       public function register(): void
{
    $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    $this->app->bind(HeadOfFamilyRepositoryInterface::class, HeadOfFamilyRepository::class);
    $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
    $this->app->bind(FamilyMemberRepositoryInterface::class, FamilyMemberRepository::class);
}

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
