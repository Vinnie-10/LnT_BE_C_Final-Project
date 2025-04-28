<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isUser;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'getWelcomePage'])->name('welcome');

Route::get('/login', [AuthController::class, 'getLoginPage'])->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/signup', [AuthController::class, 'getSignUpPage'])->name('signup.page');
Route::post('/signup', [AuthController::class, 'register'])->name('signup');

Route::get('/admin-page', function() {
    $products = Product::with('category')->get();
    return view('adminpage', compact('products'));
})->middleware(isAdmin::class)->name('admin.page');

Route::get('/dashboard', function() {
    $products = Product::with('category')->get();
    return view('userpage', compact('products'));
})->middleware(isUser::class)->name('user.page');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('create.categories');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('store.categories');

Route::get('/products/add', [ProductController::class, 'add'])->name('add.products');
Route::post('/products/store', [ProductController::class, 'store'])->name('store.products');

Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete.product');

Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit.product.page');
Route::patch('/edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');

Route::post('/basket/add/{id}', [BasketController::class, 'add'])->name('add.basket');

Route::get('/basket/view', [BasketController::class, 'view'])->name('view.basket');

Route::get('/data', [UserController::class, 'data'])->name('user.data');
Route::post('/data/save', [UserController::class, 'save'])->name('data.saved');

Route::get('/invoice', [BasketController::class, 'invoice'])->name('invoice.page');
Route::post('/invoice/save', [InvoiceController::class, 'save'])->name('invoice.saved');
