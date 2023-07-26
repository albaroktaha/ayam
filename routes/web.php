<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DistributorProductController;
use App\Http\Controllers\OrdersDistributor;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductAdmin;
use App\Http\Controllers\Auth\Daftar;
use App\Http\Controllers\Auth\RegisterUserController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
    return view('views_user.home');
});

Route::get('/log', function () {
    return view('views_user.log');
});

Auth::routes(['register' => false]);

Route::post('/daftar', [Daftar::class, 'store']);

Route::post('/register-customer', [RegisterUserController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');

//Route::post('/buy', [App\Http\Controllers\OrderController::class, 'store']);

// Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'index'])->name('order');

Route::get('/log', [App\Http\Controllers\OrderController::class, 'log']);

Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'store']);

Route::get('/invoice/{id}', [App\Http\Controllers\OrderController::class, 'invoice']);

Route::middleware(['auth', 'cekrole'])->group(function () {

    Route::get('/dashboard', function () {
        return view('index');
    });

    Route::resource('/product-distributor', DistributorProductController::class)->middleware('cekDistributor');

    Route::resource('/orders-distributor', OrdersDistributor::class)->middleware('cekDistributor');

    Route::resource('/product', ProductAdmin::class)->middleware('cekAdmin');

    Route::resource('/stock', StockController::class)->middleware('cekAdmin');

});
