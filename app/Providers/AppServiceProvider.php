<?php

namespace App\Providers;

use App\Interfaces\SocialAssistanceRecipientRepositoryInterface;
use App\Repositories\SocialAssistanceRecipientRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(
        SocialAssistanceRecipientRepositoryInterface::class,
        SocialAssistanceRecipientRepository::class
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
