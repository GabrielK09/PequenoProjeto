<?php

namespace App\Repositories\Eloquent;

use App\Models\Card;
use App\Models\CardAlteration;
use App\Repositories\Interface\Cards;
use App\Services\UserService;

class CardRepository implements Cards
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
            return Card::paginate(10);
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }
        
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
            return $this->returnResponseTh($th);

        }
    }

    public function update(array $data, int $id)
    {
        try {
            $card = $this->findByID($id);
            $update = Card::where('id', $id)->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'group' => $data['group'] ?? null,
                'contact' => $data['contact'] ?? null,
                'status' => $data['status']

            ]);

            CardAlteration::create([
                'user_id' => $data['user_id'],
                'before_status' => $card->status,
                'after_status' => $data['status'],
                'period_alteration' => $update->update_at
            ]);

            return $update;
            
        } catch (\Throwable $th) {
            return $this->returnResponseTh($th);
        }       
    }

    public function findByID(int $id)
    {
        return Card::where('id', $id)->first();

    }   

    public function delete(int $id)
    {
        return Card::where('id', $id)->update([
            'active' => 0

        ]);
    }
}