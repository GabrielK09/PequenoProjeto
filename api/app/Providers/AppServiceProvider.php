<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interface\{
    LoginInterface,
    CardInterface,
    UserInterface
};

use App\Repositories\Eloquent\{
    LoginRepository,
    CardRepository,
    UserRepository,
    
};


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(LoginInterface::class, LoginRepository::class);
        $this->app->bind(CardInterface::class, CardRepository::class);

    }
    
    public function boot(): void
    {
    
    }
}
