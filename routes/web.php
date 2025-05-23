<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(GuestController::class)->group(function() {
    Route::get('/', 'index')->name('guest.home');
});

// Route::controller(BlogController::class)->group(function() {
//     Route::get('/blogs', 'index')->name('guest.blog.all');
// });



Route::get('/blogs', [BlogController::class, 'index'])->name('guest.blog.all');
Route::get('/post/{id}', [BlogController::class, 'show'])->name('post.show');


