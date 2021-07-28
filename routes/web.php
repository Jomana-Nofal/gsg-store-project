<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
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
    return view('adminCategories.create');
});

// Category Route

Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/admin/create/categories', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/admin/save/categories', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/admin/edit/categories/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/admin/update/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/admin/destroy/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

Route::get('/admin/categories/trash', [CategoriesController::class, 'trash'])->name('categories.trash');
Route::post('/admin/categories/forceDelete/{id?}', [CategoriesController::class, 'forceDelete'])->name('category.forceDelete');

Route::put('/admin/categories/restore/{category?}', [CategoriesController::class, 'restore'])->name('category.restore');
    

// Product Route
