<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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
})->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard');

Route::get('/dashboard/posts', [PostController::class,"adminIndex"])->middleware(['auth','admin'])->name("dashboard.posts.index");
Route::get('/dashboard/post/create', [PostController::class, 'create'])->middleware(['auth', 'admin'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->middleware('auth', 'admin')->name('posts.store');

Route::get('/dashboard/posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth','admin')->name('posts.edit');
Route::post('/posts/{post}update', [PostController::class, 'update'])->middleware('auth', 'admin')->name('posts.update');


Route::post('/posts/destroy', [PostController::class, 'destroy'])->middleware('auth')->name('posts.destroy');


require __DIR__.'/auth.php';
