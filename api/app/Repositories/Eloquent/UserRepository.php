<?php

namespace App\Repositories\Eloquent;

use App\Models\Calls;
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
            'call' => 0,
            'login' => $data['login'],
            'password' => Hash::make($data['password']),

        ]);
    }

    public function update(array $data, int $id)
    {
        return Users::where('id', $id)->update([
            'name' => $data['name'],
            'call' => 0,
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
            'active' => 1

        ]);
    }

    public function findByID(int $id)
    {
        return Users::where('id', $id)->first();
        
    }

    public function delete(int $id)
    {
        return Users::where('id', $id)->update([
            'active' => 0

        ]);
    }
    
    public function call(int $call, int $id)
    {
        $user = $this->findByID($id);
        $calls = $user->call + $call;

        $user::where('id', $id)->update([
            'call' => $calls

        ]);

        Calls::create([
            'user_id' => $user->id,
            'user' => $user->name,
            'before_call' => $user->call,
            'after_call' => $calls,
            'period' => $user->updated_at
        ]);
        
        $user->save();
    }

    public function filterCalls(int $id)
    {
        return Calls::latest('id', $id)->first()->after_call;
        
    }
}