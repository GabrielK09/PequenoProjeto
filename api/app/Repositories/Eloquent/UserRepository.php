<?php

namespace App\Repositories\Eloquent;

use App\UserInterface;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    public function all()
    {
        $active = 1;
        return Users::where('active', $active)->get();
        
    }

    public function create(array $data)
    {
        return Users::create([  
            'name' => $data['name'],
            'call' => $data['call'],
            'login' => $data['login'],
            'password' => Hash::make($data['password']),

        ]);
    }
}