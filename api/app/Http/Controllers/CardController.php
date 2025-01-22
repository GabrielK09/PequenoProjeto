<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Services\CardService;

class CardController extends Controller
{   
    protected $cardService;
    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }

    public function all()
    {
        return $this->cardService->all();
    }

    public function create(CardRequest $request)
    {        
        $data = $request->validated();
        return $this->cardService->create($data);

    }

    public function update(CardRequest $request, int $id)
    {        
        $data = $request->validated();
        return $this->cardService->update($data, $id);
    }
}
