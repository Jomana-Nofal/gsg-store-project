<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


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
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



// Category Routes

Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/admin/create/categories', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/admin/save/categories', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/admin/edit/categories/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/admin/update/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/admin/destroy/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

Route::get('/admin/categories/trash', [CategoriesController::class, 'trash'])->name('categories.trash');
Route::post('/admin/categories/forceDelete/{id?}', [CategoriesController::class, 'forceDelete'])->name('category.forceDelete');

Route::put('/admin/categories/restore/{category?}', [CategoriesController::class, 'restore'])->name('category.restore');
    

// Product Routes

Route::get('/admin/create/products', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/save/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::delete('/admin/destroy/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/admin/edit/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/admin/update/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/user/show/product/{slug}', [ProductController::class, 'show'])->name('product.detaile');



// Role Routes

Route::get('/admin/roles', [RolesController::class, 'index'])->name('roles.index');
Route::get('/admin/create/roles', [RolesController::class, 'create'])->name('roles.create');
Route::post('/admin/save/roles', [RolesController::class, 'store'])->name('roles.store');
Route::get('/admin/edit/roles/{id}', [RolesController::class, 'edit'])->name('roles.edit');
Route::put('/admin/update/roles/{id}', [RolesController::class, 'update'])->name('roles.update');
Route::delete('/admin/destroy/roles/{id}', [RolesController::class, 'delete'])->name('roles.destroy');

//User Routes
Route::get('/user/products', [UserController::class, 'products'])->name('user.products');

//Cart Routes
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/show', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/destroy/item/{id}', [CartController::class, 'destroy'])->name('item.destroy');
Route::put('/cart/update/quantity/{id}', [CartController::class, 'update'])->name('quantity.update');


//checkout Routes
Route::get('/checout/create', [OrderController::class, 'create'])->name('checkout.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

