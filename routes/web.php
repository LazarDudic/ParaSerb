<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Posts\Posts;
use Illuminate\Support\Facades\Route;


// Public
Route::get('/', function () {
    return view('welcome');
});
Route::get('/all-categories', [CategoryController::class, 'showAll'])->name('all-categories');
Auth::routes(['register' => false]);

// Auth
Route::middleware('auth')->group(function () {
    Route::get('/posts', Posts::class)->name('posts.show-posts');
    Route::get('/categories', Categories::class)->name('categories.show-categories');
    Route::get('/posts/{post}/remove-image', [PostController::class, 'removeImage'])->name('posts.remove-image');
    Route::resource('/categories', CategoryController::class)
        ->only(['create', 'store', 'edit', 'update']);;
    Route::resource('/users', UserController::class);
    Route::resource('/posts', PostController::class)
        ->only(['create', 'store', 'edit', 'update']);
    Route::resource('/profile', ProfileController::class)
        ->only(['show', 'edit', 'update'])
        ->parameters(['profile' => 'user']);;
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
