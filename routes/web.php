<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
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

Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);

Route::prefix("user")->middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('user.dashboard');
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->middleware(['auth', 'verified'])->name('user.profile');
    Route::post('/profile', [\App\Http\Controllers\UserController::class, 'update'])->middleware(['auth', 'verified'])->name('user.update');
});

Route::prefix("admin")->middleware('role')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/blogs', [\App\Http\Controllers\AdminController::class, 'blogs'])->name('admin.blogs');
    Route::get('/blog/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.blog.create');
    Route::get('/blogs/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editBlog'])->name('admin.blog.edit');
    Route::delete('/blogs/delete/{id}', [\App\Http\Controllers\AdminController::class, 'destroyBlog'])->name('admin.blog.delete');
    Route::put('/blogs/update/{id}', [\App\Http\Controllers\AdminController::class, 'updateBlog'])->name('admin.blog.update');

    Route::get('/user/unblock/{id}', [\App\Http\Controllers\AdminController::class, 'unblock'])->name('admin.unblock');
    Route::get('/user/block/{id}', [\App\Http\Controllers\AdminController::class, 'block'])->name('admin.block');
});
Route::get('admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::post('admin/authenticate', [\App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.authenticate');

Route::resource("blogs", BlogController::class);
require __DIR__ . '/auth.php';
