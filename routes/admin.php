<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::controller(AdminController::class)->group(function () {
    //Route::get('/admin', 'login')->name('login');
//    Route::get('/login', 'login')->name('login');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginCheck')->name('login.check');
});

Route::middleware('auth:admin')->group(function () {
    // выход
    Route::controller(AdminController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });

    // admin products
    Route::controller(\App\Http\Controllers\admin\ProductController::class)->group(function () {
        Route::get('/', 'index')->name('products.index');
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products', 'store')->name('products.store');
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
        Route::get('/products/edit/{product}', 'edit')->name('products.edit');
        Route::patch('/products/{product}', 'update')->name('products.update');

        Route::get('/products/filter_manufacturer', 'filter_manufacturer')->name('products.filter_manufacturer');
        Route::get('/products/filter_country', 'filter_country')->name('products.filter_country');
    });

    // image
    Route::controller(\App\Http\Controllers\admin\ImageController::class)->group(function () {
        Route::delete('/image/delete', 'destroy')->name('image.destroy');
    });

    // admin orders
    Route::controller(\App\Http\Controllers\admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index')->name('orders.index');
        Route::get('/orders/filter', 'filter')->name('orders.filter');
        Route::get('/orders/{order}', 'show')->name('orders.show');
        Route::patch('/orders/confirm/{order}', 'confirm')->name('orders.confirm');

        Route::patch('/orders/cancel/{order}', 'cancel')->name('orders.cancel');
    });

    // admin countries
    Route::controller(\App\Http\Controllers\admin\CountryController::class)->group(function () {
        Route::get('/countries', 'index')->name('countries.index');
        Route::post('/countries', 'store')->name('countries.store');
        Route::get('/countries/{country}/products', 'show')->name('countries.show');
        Route::delete('/countries/{country}', 'destroy')->name('country.destroy');
    });

    // admin manufacturer
    Route::controller(\App\Http\Controllers\admin\ManufacturerController::class)->group(function () {
        Route::get('/manufacturers', 'index')->name('manufacturers.index');
        Route::post('/manufacturers', 'store')->name('manufacturers.store');
        Route::get('/manufacturers/{manufacturer}/products', 'show')->name('manufacturers.show');
        Route::delete('/manufacturers/{manufacturer}', 'destroy')->name('manufacturer.destroy');
        Route::get('/manufacturers/filter', 'filter')->name('manufacturers.filter');
    });

    // admin delivery points
    Route::controller(\App\Http\Controllers\admin\DeliveryPointController::class)->group(function () {
        Route::get('/delivery_points', 'index')->name('delivery_points.index');
        Route::post('/delivery_points', 'store')->name('delivery_points.store');
        Route::delete('/delivery_points/{point}', 'destroy')->name('point.destroy');
    });

    // admin admins
    Route::controller(\App\Http\Controllers\admin\AdminController::class)->group(function () {
        Route::get('/admins', 'adminsIndex')->name('admins.index');
        Route::get('/admins/create', 'create')->name('admins.create');
        Route::post('/admins', 'store')->name('admins.store');
        Route::delete('/admins/{admin}', 'destroy')->name('admin.destroy');
    });
});
