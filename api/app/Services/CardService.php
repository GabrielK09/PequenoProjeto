<?php

namespace App\Services;

use App\Repositories\Eloquent\CardRepository;
use App\Repositories\Eloquent\UserRepository;

class CardService
{
    protected $cardRepository;
    protected $userRepository;

    public function __construct(
        CardRepository $cardRepository,
        UserRepository $userRepository
    )
    {
        $this->cardRepository = $cardRepository;
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
            return response()->json($this->cardRepository->all());
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }

    public function update(array $data, int $id)
    {
        try {
            $this->cardRepository->update($data, $id);
            
            return response()->json([
                'success' => true,
                'update' => $this->cardRepository->findByID($id)
                
            ], 200);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }

    public function create(array $data)
    {
        try {
            $file_path = $this->archiveFile($data['file'], $data['user_id'], $data['group'] ?? $data['contact'], $data['description']);

            $card = $this->cardRepository->create($data, $file_path);

            return response()->json([
                'success' => $card['success'],
                'message' => $card

            ], 200);

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);

        }
    }

    public function show(int $id)
    {
        return response()->json($this->cardRepository->findByID($id));
    }

    public function archiveFile(object $file, int $id, string $group, string $description)
    {
        
        try {
            $directory = public_path('casos_roxo/' . $this->userRepository->findByID($id)->name . '/' . $group);
            $name = $file->getClientOriginalName();

            if(!is_dir($directory))
            {
                mkdir($directory, 0755, true);
    
            }

            $descriptionFile = $directory . '/Caso.txt';
            file_put_contents($descriptionFile, $description);

            $path = $file->move($directory, $name);

            return $path->getPathname();

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),
    
            ], 400);

        }
    }
}