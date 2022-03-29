<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\PostEdit;
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
})->name('welcome');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('dashboard/posts', [PostController::class, 'dashboardIndex'])->middleware(['auth'])->name('posts.dashboard.index');
Route::get('dashboard/posts/create', [PostController::class, 'create'])->middleware(['auth'])->name('post.create');
Route::post('dashboard/post/create', [PostController::class, 'store'])->middleware(['auth'])->name('post.store');
Route::get('dashboard/posts/{post}/edit', [PostController::class, 'edit'])->middleware(['auth'])->name('posts.edit');
Route::post('dashboard/posts/{post}/edit', [PostController::class, 'update'])->middleware(['auth'])->name('post.update');



require __DIR__.'/auth.php';
