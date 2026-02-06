<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;

Route::prefix('v1')->group(function (){

    Route::get('/teste',                   [AuthController::class, 'teste']);
    Route::get('/login',                   [AuthController::class, 'login'])->middleware('throttle:50,1');
    Route::post('/logout',                 [AuthController::class, 'logout']);
    Route::get('/categorias',              [CategoryController::class, 'all']);
    Route::post('/categoria/create',       [CategoryController::class, 'store']);
    Route::put('/categoria/update/{id}',   [CategoryController::class, 'update']);
    Route::delete('/categoria/delete/{id}',[CategoryController::class, 'delete']);
    Route::get('/menus',                   [MenuController::class, 'all']);
    Route::post('/menu/create',            [MenuController::class, 'store']);
    Route::put('/menu/update/{id}',        [MenuController::class, 'update']);
    Route::delete('/menu/delete/{id}',     [MenuController::class, 'delete']);

});