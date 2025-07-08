<?php

namespace App\Providers;

use App\Interfaces\FamilyMemberRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\HeadOfFamilyRepositoryInterface;
use App\Repositories\FamilyMemberRepository;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(HeadOfFamilyRepositoryInterface::class, HeadOfFamilyRepository::class);
        $this->app->bind(FamilyMemberRepositoryInterface::class,FamilyMemberRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
