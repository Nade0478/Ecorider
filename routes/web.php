<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Page Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// Auth::routes();

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// require __DIR__.'/auth.php';
// Route::resource('posts', App\Http\Controllers\PostController::class)->middleware('auth');
// Route::resource('comments', App\Http\Controllers\CommentController::class)->middleware('auth');

// Route::post('/posts/{post}/like', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like')->middleware('auth');
// Route::post('/posts/{post}/unlike', [App\Http\Controllers\PostController::class, 'unlike'])->name('posts.unlike')->middleware('auth');

