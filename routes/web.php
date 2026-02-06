<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',          [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::post('/login',         [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout',        [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware('auth')->group(function (){
    Route::get('/users',          [UserController::class, 'index'])->name('users.all');
    Route::get('/hello',          [UserController::class, 'home'])->name('index');
    Route::get('/user/create',    [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create',   [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/edit', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}',   [UserController::class, 'destroy'])->name('user->destroy');
});