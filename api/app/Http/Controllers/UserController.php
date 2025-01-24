<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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

    public function create(UserRequest $request)
    {
        $data = $request->validated();
    
        return $this->userService->create($data);

    }

    public function update(UserRequest $request, int $id)
    {
        $data = $request->validated();
        
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
    
    public function callInput(UserRequest $request, int $id)
    {
        $data = $request->validated();
        return response()->json($data);
        //return $this->userService->callInput($data, $id);                             


    }

    public function callExit(Request $request, int $id)
    {
        if($request->has('call'))
        {
            return $this->userService->callExit($request->input('call'), $id);
        }    
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
