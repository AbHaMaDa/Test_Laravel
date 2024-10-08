<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts',[TestController::class,'postsIndex'] )->name('posts.index');

Route::get('posts/create',[TestController::class,'create'])->name('posts.create');

Route::get('/posts/{id}', [TestController::class,'show'])->name('posts.show');


Route::post('/posts',[TestController::class,'store'])->name('posts.store');


Route::get('posts/{id}/edit',[TestController::class,'edit'])->name('posts.edit');



Route::put('posts/{id}', [TestController::class,'update'])->name('posts.update');


Route::delete('posts/{id}', [TestController::class,'destroy'])->name('posts.destroy');


Route::get('search', [TestController::class,'search'])->name('posts.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Example of route grouping with prefix 'api'

Route::prefix('/api')->group(function () {
    Route::get('/data', [ApiController::class, 'getData']);
});
