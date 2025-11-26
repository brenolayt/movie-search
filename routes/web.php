<?php

use App\Http\Controllers\mainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [mainController::class, 'show'])->name('home');
Route::get('movie/{id}', [mainController::class, 'details'])->name('view-more');
Route::get('/movie-search', [mainController::class, 'search'])->name('search');