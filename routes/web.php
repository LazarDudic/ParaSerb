<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::get('/posts', Posts::class)->name('posts.show-posts');
    Route::resource('/posts', PostController::class)
        ->only(['show', 'create', 'store', 'edit', 'update']);
    Route::get('/posts/{post}/remove-image', [PostController::class, 'removeImage'])->name('posts.remove-image');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
