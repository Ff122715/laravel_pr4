<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Route::get('/', function () {
//    return view('main');
//})->name('main');


Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginCheck')->name('login.check');
    Route::get('/reg', 'create')->name('users.reg');
    Route::post('/reg', 'store')->name('users.store');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('products.index');
    Route::get('/products/{product}', 'show')->name('products.show');

});

// для авторизованных
Route::middleware('auth')->group(function () {
    // basket
    Route::controller(BasketController::class)->group(function () {
        Route::get('/basket', 'index')->name('basket');
        Route::post('/basket/add', 'add')->name('basket.add');
        Route::patch('/basket/decrease', 'decrease')->name('basket.decrease');
        Route::delete('/basket/{basket}', 'destroy')->name('basket.destroy');
    });

    // order
    Route::controller(OrderController::class)->group(function () {
        Route::post('/order', 'store')->name('orders.store');
        Route::delete('/order/{order}', 'destroy')->name('orders.destroy');
        Route::get('/order/{order}', 'show')->name('orders.show');
    });

    // user routes
    Route::controller(UserController::class)->group(function () {
        Route::get('/logout', 'logout')->name('users.logout');
        Route::get('/profile', 'show')->name('users.profile');
    });
});
