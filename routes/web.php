<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\UserController;

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
require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/{article}', [HomeController::class, 'show'])->name('article-page');

Route::middleware(['auth', 'xss', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard');
    Route::get('/articles', [ArticleController::class, 'index'])->name('article');

    Route::get('/article/create', [ArticleController::class, 'create'])->name('article-create');
    Route::post('/article/create', [ArticleController::class, 'store'])->name('article-store');

    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article-edit');
    Route::patch('/article/{article}/edit', [ArticleController::class, 'update'])->name('article-update');

    Route::delete('/article/{article}/delete', [ArticleController::class, 'destroy'])->name('article-destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

    Route::get('/category/create', [CategoryController::class, 'create'])->name('category-create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category-store');

    Route::patch('/category/{category}/edit', [CategoryController::class, 'update'])->name('category-update');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category-edit');

    Route::delete('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('category-destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user-edit');
    Route::patch('/user/{user}/edit', [UserController::class, 'update'])->name('user-update');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


