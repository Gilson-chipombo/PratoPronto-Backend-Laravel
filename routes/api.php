<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\AuthController;


Route::prefix('v1')->group(function (){

    Route::get('/teste',   [AuthController::class, 'teste']);
    Route::get('/login',   [AuthController::class, 'login'])->name('login')->middleware('throttle:50,1');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});