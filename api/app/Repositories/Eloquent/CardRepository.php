<?php

namespace App\Repositories\Eloquent;

use App\Models\Card;
use App\Repositories\Interface\CardInterface;
use App\Services\UserService;

class CardRepository implements CardInterface
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function all()
    {
        return Card::paginate(10);
    }

    public function create(array $data, string $file_path)
    {
        try {
            
            $user = $this->userService->findByID($data['user_id']);
            Card::create([
                'user_id' => $user->id,
                'user' => $user->name,
                'title' => $data['title'],
                'description' => $data['description'],
                'group' => $data['group'] ?? null,
                'contact' => $data['contact'] ?? null,
                'file_path' => $file_path
    
            ]);

            return ([
                'success' => 'true',
                
            ]);

        } catch (\Throwable $th) {
            return ([
                'success' => 'false',
                'th' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getfile(),

            ]);

        }
    }

    public function update(array $data, int $id)
    {
        
    }

    public function findByID(int $id)
    {
        
    }

    public function delete(int $id)
    {
        
    }
}