<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::prefix('v1')->group( function (){
    Route::get('/all', [UserController::class, 'all'])->name('v1.all');
    Route::post('/create', [UserController::class, 'create'])->name('v1.create');

});
