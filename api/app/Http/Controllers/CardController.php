<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
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
        //return response()->json($request->file('file')->getFilename());
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'group' => 'nullable|required_without:contact',
            'contact' => 'nullable|required_without:group',
            'description' => 'required',
            'file' => 'required',
            'status' => 'required',

        ]);
        return $this->cardService->create($data);

    }

    public function update(CardRequest $request, int $id)
    {        
        $data = $request->validated();
        return $this->cardService->update($data, $id);
    }
}
