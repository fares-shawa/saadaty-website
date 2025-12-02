<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/stores/{id}', [PagesController::class, 'Stores'])->name('stores');
Route::get('/store/{id}', [PagesController::class, 'Store'])->name('store');
