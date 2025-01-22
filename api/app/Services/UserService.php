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
            return response()->json([
                'success' => true,
                'update' => $this->repository->update($data, $id)
            
            ]);

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
            return response()->json([
                'success' => true,
                'delete' => $this->repository->delete($id)

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
                'call' => $this->repository->callInput($call, $id)
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
                'call' => $this->repository->callExit($call, $id)
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
                'calls' => $this->repository->getCalls($id),
                
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
                'filter' => $this->repository->filterCalls($data, $id)
            ]);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }
}