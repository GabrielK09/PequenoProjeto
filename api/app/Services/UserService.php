<?php

namespace App\Services;

use App\Repositories\Eloquent\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

    public function returnResponseTh($th)
    {
        return response()->json([
            'success' => false,
            'th' => $th->getMessage(),
            'line' => $th->getLine(),
            'file' => $th->getfile(),

        ], 400);
    }
    

    public function all()
    {
        try {
            return response()->json([
                'success' => true,
                'all' => $this->userRepository->all()
            ], 200);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
            
        }
    }

    public function create(array $data)
    {
        try {
            return response()->json([
                'success' => true,
                'create' => $this->userRepository->create($data)

            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'thLocal' => 'CandidateService',
                'success' => false,
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
    
            ], 400);

        }
    }

    public function update(array $data, int $id)
    {
        try {
            return response()->json([
                'success' => true,
                'update' => $this->userRepository->update($data, $id)
            
            ]);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function findByID(int $id)
    {
        try {
            return $this->userRepository->findByID($id);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }        
    }

    public function delete(int $id)
    {
        try {
            return response()->json([
                'success' => true,
                'delete' => $this->userRepository->delete($id)

            ]);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function callInput(int $call, int $id)
    {
        try {
            return response()->json([
                'success' => true,
                'call' => $this->userRepository->callInput($call, $id)
            ]);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function callExit(int $call, int $id)
    {
        try {
            return response()->json([
                'success' => true,
                'call' => $this->userRepository->callExit($call, $id)
            ]);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function getCalls(int $id)
    {
        try {
            return response()->json([
                'success' => true,
                'calls' => $this->userRepository->getCalls($id),
                
            ]);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function filterCalls(array $data, int $id)
    {
        try {
            return response()->json([
                'success' => true,
                'filter' => $this->userRepository->filterCalls($data, $id)
            ]);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }
}