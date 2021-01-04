<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Posts\Posts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/posts', Posts::class)->name('posts.show-posts');
    Route::get('/categories', Categories::class)->name('categories.show-categories');
    Route::get('/posts/{post}/remove-image', [PostController::class, 'removeImage'])->name('posts.remove-image');
    Route::resource('/categories', CategoryController::class)
        ->only(['show', 'create', 'store', 'edit', 'update']);;
    Route::resource('/users', UserController::class);
    Route::resource('/posts', PostController::class)
        ->only(['show', 'create', 'store', 'edit', 'update']);
    Route::resource('/profile', ProfileController::class)
        ->only(['show', 'edit', 'update'])
        ->parameters(['profile' => 'user']);;

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
