<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
Route::middleware(['auth'])->group(
    function () {
        Route::get('/users/{id}/comments/create', [CommentControllerr::class, 'create'])->name('comments.create');
        Route::get('/users/{user}/comments/{id}', [CommentController::class, 'edit'])->name('comments.edit');
        Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
        Route::post('/users/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comments.index');

        Route::delete('/users/{id}', [UserControllerr::class, 'destroy'])->name('users.destroy');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    }
);
require __DIR__ . '/auth.php';
