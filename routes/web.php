<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CountryController as AdminCountryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/search', [CatalogController::class, 'search'])->name('search');

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('/countries/{country}', [CountryController::class, 'show'])->name('countries.show');

Route::middleware(['guest'])->prefix('/admin')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login.submit');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/user/profile', [UserController::class, 'index'])->name('user.profile');
    Route::get('/user/change-password', [UserController::class, 'changePassword'])->name('auth.changePassword');
    Route::patch('/user/change-password/update', [UserController::class, 'passwordUpdate'])->name('auth.passwordUpdate');

});

Route::middleware(['admin'])->prefix('/admin')->group(function () {
    Route::get('/products/{product:slug}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/{product:slug}', [AdminProductController::class, 'update'])->name('products.update');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');

    Route::get('/categories/edit/{category:slug}', [AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/update/{category:slug}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category:slug}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [AdminCategoryController::class, 'store'])->name('categories.store');


    Route::get('/reviews', [\App\Http\Controllers\ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/update', [\App\Http\Controllers\ReviewController::class, 'status_update'])->name('review.update');
    Route::post('/review/create', [\App\Http\Controllers\ReviewController::class, 'create'])->name('review.create');

    Route::resource('/countries', AdminCountryController::class)->names([
        'index'=>'countries.index',
        'create'=>'countries.create',
        'edit'=>'countries.edit',
        'store'=>'countries.store',
        'destroy' => 'countries.destroy'
    ]);
//    Route::post('/countries', [AdminCountryController::class, 'store'])->name('countries.store');
//    Route::get('/countries/create', [AdminCountryController::class, 'create'])->name('countries.create');
//    Route::post('/countries', [AdminCountryController::class, 'update'])->name('countries.update');
//    Route::delete('/countries/{country}', [AdminCountryController::class, 'destroy'])->name('countries.destroy');
//    Route::get('/countries/edit/{country}', [AdminCountryController::class, 'edit'])->name('countries.edit');

    Route::get('/panel', [AdminController::class, 'cabinet'])->name('admin.panel');
});
