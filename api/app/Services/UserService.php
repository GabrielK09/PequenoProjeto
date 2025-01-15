<?php

namespace App\Services;

use App\Repositories\Eloquent\UserRepository;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
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
    

    public function all()
    {
        try {
            return response()->json([
                'success' => true,
                'all' => $this->repository->all()
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
                'create' => $this->repository->create($data)

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
            return response()->json($this->repository->update($data, $id));

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function findByID(int $id)
    {
        try {
            return $this->repository->findByID($id);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }        
    }

    public function delete(int $id)
    {
        try {
            return response()->json($this->repository->delete($id));

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }
}