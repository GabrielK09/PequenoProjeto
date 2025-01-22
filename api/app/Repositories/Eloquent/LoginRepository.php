<?php

namespace App\Repositories\Eloquent;

use App\Models\Users;
use App\Repositories\Interface\Login;

class LoginRepository implements Login
{
    public function find(string $param)
    {
        return Users::where('login', $param)->first();
           
    }
}