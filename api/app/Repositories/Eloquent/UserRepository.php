<?php

namespace App\Repositories\Eloquent;

use App\Models\Calls;
use App\Models\Users;

use App\Repositories\Interface\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements User
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
    
    public function getCalls(int $id)
    {
        $user = Users::where('id', $id)->first();
        $total_call = $user->total_call_input + $user->total_call_exit;

        $user->update([
            'total_call' => $total_call
        ]);
        $user->save();

        return $user;
        
    }

    public function filterCalls(array $data,int $id)
    {
        // Precisa alterar para isso SELECT * FROM calls WHERE user_id = 4 ORDER BY after_call_input AND id LIMIT 1
        $filter = Calls::latest('id', $id) //select after_call from calls where id = 1 order by id limit 1
                    ->orWhereBetween('period', [$data['start'], $data['end']])
                    ->first();

        if($filter != null)
        {
            return $filter;

        }
        
        return null;   
    }

    public function callInput(int $call, int $id)
    {
        $user = $this->findByID($id);
        $totalCall = $user->total_call_input + $call;

        $user::where('id', $id)->update([
            'total_call_input' => $totalCall,

        ]);
        
        Calls::create([
            'user_id' => $user->id,
            'user' => $user->name,
            'before_call_input' => $user->total_call_input,
            'after_call_input' => $user->total_call_input + 1,
            'before_call_exit' => $user->total_call_exit - 1,
            'after_call_exit' => $user->total_call_exit,
            'period' => $user->updated_at

        ]);

        $user->save();
        return $user->total_call_input;
    }

    public function callExit(int $call, int $id)
    {
        $user = $this->findByID($id);
        $totalCall = $user->total_call_exit + $call;

        $user::where('id', $id)->update([
            'total_call_exit' => $totalCall,

        ]);

        Calls::create([
            'user_id' => $user->id,
            'user' => $user->name,
            'before_call_input' => $user->total_call_input - 1,
            'after_call_input' => $user->total_call_input,
            'before_call_exit' => $user->total_call_exit,
            'after_call_exit' => $user->total_call_exit + 1,
            'period' => $user->updated_at

        ]);
        
        $user->save();
        return $user->total_call_exit;
        
    }
}