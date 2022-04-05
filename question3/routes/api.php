<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:api'])->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/balance', [TransactionController::class, 'topUpBalance'])->name('topupBalance');
    Route::get('/balance', [TransactionController::class, 'balance'])->name('findBalance');
    Route::post('/transaction', [TransactionController::class, 'transaction'])->name('transaction');
});
