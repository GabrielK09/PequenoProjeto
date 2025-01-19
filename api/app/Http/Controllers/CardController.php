<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CardService;
use Illuminate\Http\Request;

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

    public function create(Request $request)
    {        
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'group' => 'nullable|required_without:contact',
            'contact' => 'nullable|required_without:group',
            'description' => 'required',
            'file' => 'required',

       ]);
       
       return $this->cardService->create($data);

    }
}
