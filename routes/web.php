<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifiedUserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', function () {
    $categories = Category::paginate(10);
    return view('categories', compact('categories'));
})->name('categories');
Route::get('/account', fn() => view('account'))->name('account');
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/extra', fn() => view('extra'))->name('extra');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.register');

Route::post('/logout', [VerifiedUserController::class, 'logout'])->name('logout');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::resource('products', ProductController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy'])
    ->middleware([]);

Route::resource('comments', CommentController::class)
    ->only(['store', 'edit', 'update', 'destroy'])
    ->middleware([]);
