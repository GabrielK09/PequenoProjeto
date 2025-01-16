<?php

namespace App\Repositories\Eloquent;

use App\Models\Users;
use App\Repositories\Interface\LoginInterface;

class LoginRepository implements LoginInterface
{
    public function find(string $param)
    {
        return Users::where('login', $param)->first();
           
    }
}