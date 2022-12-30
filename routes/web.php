<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'home']);

Route::get('/product_details', function () {
    return view('product_details');
});

Route::get('/account', function () {
    return view('account');
})->name('account');


Route::resource('/products', ProductController::class);
Route::resource('/users', UserController::class);
Route::get('/admin_products', [ProductController::class, 'addProduct'])->middleware('auth');
Route::post('/add-to-cart', [ProductController::class, 'addToChart']);
Route::get('/cart', [ProductController::class, 'viewChart']);
Route::get('/remove-item/{rowId}', [ProductController::class, 'removeItem']);
