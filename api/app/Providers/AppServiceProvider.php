<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Eloquent\UserRepository;
use App\UserInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserInterface::class);

    }
    
    public function boot(): void
    {
    
    }
}
