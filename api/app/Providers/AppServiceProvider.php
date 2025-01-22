<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interface\{
    Login,
    Cards,
    User
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
        $this->app->bind(User::class, UserRepository::class);
        $this->app->bind(Login::class, LoginRepository::class);
        $this->app->bind(Cards::class, CardRepository::class);

    }
    
    public function boot(): void
    {
    
    }
}
