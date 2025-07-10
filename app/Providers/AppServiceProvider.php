<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Interfaces\SocialAssistanceRecipientRepositoryInterface;
use App\Repositories\SocialAssistanceRecipientRepository;
=======
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
<<<<<<< HEAD
         $this->app->bind(
        SocialAssistanceRecipientRepositoryInterface::class,
        SocialAssistanceRecipientRepository::class
         );
        }
=======
        //
    }

>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
