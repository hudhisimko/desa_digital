<?php

namespace App\Providers;

use App\Http\Controllers\SocialAssistanceRecipientController;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\HeadOfFamilyRepositoryInterface;
use App\Interfaces\SocialAssistanceRecipientRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\HeadOfFamilyRepository;
use App\Repositories\SocialAssistanceRecipientRepository;
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
        $this->app->bind(SocialAssistanceRecipientRepositoryInterface::class, SocialAssistanceRecipientRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
