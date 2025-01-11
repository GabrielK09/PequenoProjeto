<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interface\UserInterface;
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

    public function update(array $data, int $id)
    {
        return Users::where('id', $id)->update([
            'name' => $data['name'],
            'call' => $data['call'],
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
            'active' => 1

        ]);
    }

    public function delete(int $id)
    {
        return Users::where('id', $id)->update([
            'active' => 0

        ]);
    }
}