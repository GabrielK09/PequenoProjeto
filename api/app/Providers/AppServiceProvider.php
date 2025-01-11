<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interface\UserInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);

    }
    
    public function boot(): void
    {
    
    }
}
