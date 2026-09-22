<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::get('auth/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('auth.login');
    Route::post('auth/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('auth.login.submit');
    Route::post('/auth/register', [RegisterController::class, 'register'])->name('auth.register.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', [UserController::class,'index'])->name('user.profile');
});

Route::get('catalog', [CatalogController::class,'index'])->name('catalog.index');

Route::get('/search', [CatalogController::class, 'search'])->name('search');

Route::get('/admin/products/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.create');
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/countries/{country}', [ProductController::class, 'country'])->name('countries.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/admin/products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
Route::get('/admin/products/{product:slug}/edit', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');
Route::patch('/admin/products/{product:slug}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
