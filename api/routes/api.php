<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    UserController,
    LoginController,
    CardController

};


Route::prefix('v1')->group( function (){
    Route::get('/all', [UserController::class, 'all']);
    Route::post('/create-user', [UserController::class, 'create']);
    Route::post('/create-card', [CardController::class, 'create']);
    Route::post('/login', [LoginController::class, 'login']);
 
});
