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

    public function update(Request $request, int $id)
    {        
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'group' => 'required',
            'contact' => 'required',
            'description' => 'required',
            'status' => 'required',
            'file' => 'required',

       ]);
       
      

    }
}
