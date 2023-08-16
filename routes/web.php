<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Blog Post
Route::group(['prefix' => 'post'], function () {
    Route::get('/', [BlogPostController::class, 'index'])->name('posts.index');
    Route::get('/create', [BlogPostController::class, 'create'])->name('posts.create');
    Route::post('/store', [BlogPostController::class, 'store'])->name('posts.store');
    Route::get('/edit/{id}', [BlogPostController::class, 'edit'])->name('posts.edit');
    Route::put('/update/{id}', [BlogPostController::class, 'update'])->name('posts.update');
    Route::delete('/delete/{id}', [BlogPostController::class, 'destroy'])->name('posts.destroy');
});