<?php

namespace App\Services;

use App\Repositories\Eloquent\LoginRepository;
use Illuminate\Support\Facades\Hash;
class LoginService
{
    protected $repository;
    public function __construct(LoginRepository $repository)
    {
        $this->repository = $repository;

    }
    public function returnResponseTh($th)
    {
        return response()->json([
            'thLocal' => 'CandidateService',
            'success' => false,
            'th' => $th->getMessage(),
            'line' => $th->getLine(),
            'file' => $th->getfile(),

        ], 400);
    }

    public function login(array $data)
    {
        try {
            $user = $this->repository->find($data['login']);

            if(empty($user))
            {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuário não encontrado',
                    
                ]);
            }

            if($user->active == 0)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuário desativado',
                    
                ]);
            }   

            if($user && Hash::check($data['password'], $user->password))
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Login bem sucedido',
                    'user_id' => $user->id,
                    'leader' => $user->leader

                ]);
            }            

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }

}