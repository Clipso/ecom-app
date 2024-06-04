<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->
middleware(['auth', 'admin']);
// Category
Route::get('view_category', [AdminController::class, 'view_category'])->
middleware(['auth', 'admin']);
Route::get('create_category', [AdminController::class, 'create_category'])->
middleware(['auth', 'admin']);
Route::post('add_category', [AdminController::class, 'add_category'])->
middleware(['auth', 'admin']);
Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->
middleware(['auth', 'admin']);
Route::put('update_category/{id}', [AdminController::class, 'update_category'])->
middleware(['auth', 'admin']);
Route::delete('delete_category/{id}', [AdminController::class, 'delete_category']);

// Product
Route::get('product_list', [AdminController::class, 'product_list'])->
middleware(['auth', 'admin']);
Route::get('single_product/{id}', [AdminController::class, 'single_product'])->
middleware(['auth', 'admin']);
Route::get('create_product', [AdminController::class, 'create_product'])->
middleware(['auth', 'admin']);
Route::post('add_product', [AdminController::class, 'add_product'])->
middleware(['auth', 'admin']);
Route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->
middleware(['auth', 'admin']);
Route::put('update_product/{id}', [AdminController::class, 'update_product'])->
middleware(['auth', 'admin']);
Route::delete('delete_product/{id}', [AdminController::class, 'delete_product']);

// Customer
Route::get('customer_list', [AdminController::class, 'customer_list'])->
middleware(['auth', 'admin']);
Route::get('create_customer', [AdminController::class, 'create_customer'])->
middleware(['auth', 'admin']);

Route::get('about_us', [HomeController::class, 'about_us'])->middleware(['auth', 'admin']);

Route::get('/hadith', [HomeController::class, 'hadith'])->name('hadith');
