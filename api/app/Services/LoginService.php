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
            if($user && Hash::check($data['password'], $user->password))
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Login bem sucedido',
                    'user_id' => $user->id,
                    'leader' => $user->leader

                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'O login falhou'
                
            ]);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }

}