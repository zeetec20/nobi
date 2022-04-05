<?php

use App\Http\Controllers\FactController;
use Illuminate\Support\Facades\Route;

Route::get('/random', [FactController::class, 'random'])->name('random');
Route::get('/categories', [FactController::class, 'categories'])->name('categories');
