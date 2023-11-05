<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\RandomGeneratorController;
use App\Http\Controllers\EmailHistoryController;
use App\Http\Controllers\RegisterController;

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
Route::get('products/export/', [ProductController::class, 'export'])->name('products.export'); // 상단위치
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::post('/products/search',[ProductController::class, 'search'])->name("products.search");
Route::get('products/{product}',[ProductController::class, 'show'])->name("products.show");
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name("products.edit");
Route::patch('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('random',[RandomGeneratorController::class,'export'])->name('random.export');
Route::get('/email', function () {
    return view('emailForm');
})->name('emailForm');
Route::post('/emailSend', [EmailHistoryController::class, 'emailSend'])->name('emailSend');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
