<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

//posts

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::Post('/posts/store',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show');
Route::get('/posts/{id}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::post('/posts/{id}/update',[PostController::class,'update'])->name('posts.update');
Route::post('/posts/delete',[PostController::class,'destroy'])->name('posts.destroy');
