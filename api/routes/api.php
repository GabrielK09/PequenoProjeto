<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    UserController,
    LoginController,
    CardController

};


Route::prefix('v1')->group( function (){
    Route::get('/all/users', [UserController::class, 'all']);
    Route::post('/create-user', [UserController::class, 'create']);
    Route::get('/user/{id}', [UserController::class, 'findByID']);
    Route::put('/call/add_input/{id}', [UserController::class, 'callInput']);
    Route::put('/call/add_exit/{id}', [UserController::class, 'callExit']);
    Route::get('/call/all/{id}', [UserController::class, 'getCalls']);
    Route::post('/call/filter/{id}', [UserController::class, 'filterCalls']);

    Route::get('/all/cards', [CardController::class, 'all']);
    Route::post('/create-card', [CardController::class, 'create']);

    Route::post('/login', [LoginController::class, 'login']);
 
});
