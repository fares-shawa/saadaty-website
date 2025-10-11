<?php

use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;


// home view
Route::get('/', [IndexController::class, 'index'])->name('home');

// stores
Route::get('/stores/{id}', [IndexController::class, 'Stores'])->name('stores');

Route::get('/store/{id}', [IndexController::class, 'Store'])->name('store');

Route::get('/blog', function() {
    return view('frontend.blog');
});

Route::get('/contact', function() {
    return view('frontend.contact');
});


require __DIR__.'/auth.php';
