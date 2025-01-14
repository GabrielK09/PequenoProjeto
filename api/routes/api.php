<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::prefix('v1')->group( function (){
    Route::get('/all', [UserController::class, 'all']);
    Route::post('/create', [UserController::class, 'create']);
    Route::post('/file-upload', [UserController::class, 'archiveFile']);
    Route::post('/login', [LoginController::class, 'login']);
 
});
