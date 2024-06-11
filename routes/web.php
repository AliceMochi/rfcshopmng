<?php

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
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/edit/{id}/{type}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/update/{id}/{type}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/destroy/{id}/{type}', [ProductController::class, 'destroy'])->name('products.destroy');

