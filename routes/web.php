<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [BlogController::class, 'index'])->name('main');

Route::get('/blog/{id}', [BlogController::class, 'blog'])->name('blog');

Route::get('/blogs', [BlogController::class, 'blogs'])->name('blog-list');

Route::post('/blog', [BlogController::class, 'create'])->name('blog-create');

Route::get('/blog/{id}/delete', [BlogController::class, 'delete'])->name('blog-delete');

Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog-update');

Auth::routes();

Route::get('/check-login', [HomeController::class, 'index'])->name('check-login');
