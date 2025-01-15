<?php

namespace App\Services;

use App\Repositories\Eloquent\CardRepository;
use App\Repositories\Eloquent\UserRepository;

class CardService
{
    protected $repository;
    protected $userRepository;

    public function __construct(
        CardRepository $repository,
        UserRepository $userRepository
    )
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;

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

    public function create(array $data)
    {
        try {
            $file_path = $this->archiveFile($data['file'], $data['user_id'], $data['group'], $data['description']);
            $card = $this->repository->create($data, $file_path);
            return response()->json([
                'success' => $card['success'],
                'message' => $card
            ]);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
        
    }

    public function archiveFile(object $file, int $id, string $group, string $description)
    {
        try {
            $directory = public_path('casos_roxo/' . $this->userRepository->findByID($id)->name . '/' . $group);
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
    
            if(!is_dir($directory))
            {
                mkdir($directory, 0755, true);
    
            }
            
            /*$descriptionFile = fopen('Caso.txt', 'a');
            fwrite($descriptionFile, $description);
            fclose($descriptionFile);*/
            $descriptionFile = $directory . '/Caso.txt';
            file_put_contents($descriptionFile, $description);

            $path = $file->move($directory, $name);

            return $path->getPathname();

        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
    }
}