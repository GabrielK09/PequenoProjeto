<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interface\UserInterface;

use App\Repositories\Interface\LoginInterface;
use App\Repositories\Eloquent\LoginRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(LoginInterface::class, LoginRepository::class);

    }
    
    public function boot(): void
    {
    
    }
}
