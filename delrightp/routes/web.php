<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get(
    '/home',
    [App\Http\Controllers\HomeController::class, 'index']
)->name('home');

Route::get(
    '/user/{id}',
    [App\Http\Controllers\HomeController::class, 'user']
);

Route::get(
    '/users',
    [App\Http\Controllers\HomeController::class, 'users']
);

Route::get(
    '/vendorkyc/{id}',
    [App\Http\Controllers\HomeController::class, 'vendorkycData']
);

Route::get(
    '/deliveryusers',
    [App\Http\Controllers\HomeController::class, 'deliveryusers']
);

Route::get(
    '/deliverypartnerkyc/{id}',
    [App\Http\Controllers\HomeController::class, 'delPartnerKYCData']
);

Route::get(
    '/vendors',
    [App\Http\Controllers\HomeController::class, 'sellers']
);

Route::get(
    '/vendor/{id}',
    [App\Http\Controllers\HomeController::class, 'seller']
);

Route::get(
    '/products',
    [App\Http\Controllers\HomeController::class, 'products']
);

Route::get(
    '/product/{id}',
    [App\Http\Controllers\HomeController::class, 'product']
);

Route::get(
    '/order/{id}',
    [App\Http\Controllers\HomeController::class, 'order']
);


Route::GET(
    '/deleteSeller/{id}',
    [App\Http\Controllers\HomeController::class, 'DeleteSeller']
);
Route::GET(
    '/deleteProduct/{id}',
    [App\Http\Controllers\HomeController::class, 'DeleteProduct']
);

Route::get(
    '/addCategory',
    [App\Http\Controllers\HomeController::class, 'addCategory']
);
Route::get(
    '/addProduct',
    [App\Http\Controllers\HomeController::class, 'addProduct']
);

Route::post(
    '/addProduct',
    [App\Http\Controllers\HomeController::class, 'insertProduct']
)->name('InsertProduct');

Route::get(
    '/addMarketProduct',
    [App\Http\Controllers\HomeController::class, 'addMarketProduct']
);

Route::post(
    '/addMarketProduct',
    [App\Http\Controllers\HomeController::class, 'insertMarketProduct']
)->name('InsertMarketProduct');

Route::Post(
    '/addCategory',
    [App\Http\Controllers\HomeController::class, 'insertCategory']
)->name('InsertCatrgory');

Route::GET(
    '/deleteCategory/{id}',
    [App\Http\Controllers\HomeController::class, 'deleteCategory']
);
Route::GET(
    '/deleteProduct/{id}',
    [App\Http\Controllers\HomeController::class, 'deleteProduct']
);

Route::POST(
    '/verifyKYCSellerDetails/{id}',
    [App\Http\Controllers\HomeController::class, 'verifyKYCSellerDetails']
);

Route::POST(
    '/verifyKYCDeliveryDetails/{id}',
    [App\Http\Controllers\HomeController::class, 'verifyKYCDeliveryDetails']
);

Route::POST(
    'addcod',
    [App\Http\Controllers\HomeController::class, 'addCOD']
);