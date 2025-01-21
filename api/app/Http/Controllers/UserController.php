<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }

    public function all()
    {
        return $this->userService->all();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'login' => 'required',
            'password' => 'required'

        ]);
    
        return $this->userService->create($data);

    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'call' => 'required|string',
            'login' => 'required|string',
            'password' => 'required|string'

        ]);
        
    return $this->userService->update($data, $id);
    }

    public function delete(int $id)
    {  
        return $this->userService->delete($id);
        
    }
    public function findByID(int $id)
    {
        return $this->userService->findByID($id);
    }
    
    public function call(Request $request, int $id)
    {
        return $this->userService->call($request->input('call'), $id);
    }

    public function getCalls(int $id)
    {
        return $this->userService->getCalls($id);

    }

    public function filterCalls(Request $request, int $id)
    {
        $data = $request->validate([
            'start' => 'required|date',
            'end' => 'required|date'

        ]);
        return $this->userService->filterCalls($data, $id);

    }
}
