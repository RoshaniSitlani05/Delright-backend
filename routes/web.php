<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now getcreate something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('termsandconditions', function () {
    return view('termsandconditions');
});

Route::get('privacypolicy', function () {
    return view('privacypolicy');
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

Route::GET(
    '/userStatus/{id}/{status}',
    [App\Http\Controllers\HomeController::class, 'updateUserStatus']
);

Route::GET(
    '/marketProductStatus/{id}/{status}',
    [App\Http\Controllers\HomeController::class, 'updateMarketProductStatus']
);

Route::GET(
    '/ProductCategoryStatus/{id}/{status}',
    [App\Http\Controllers\HomeController::class, 'updateProductCategoryStatus']
);


Route::GET(
    '/shopCategoryStatus/{id}/{status}',
    [App\Http\Controllers\HomeController::class, 'updateShopCategoryStatus']
);


Route::GET(
    '/partnerStatus/{id}/{status}',
    [App\Http\Controllers\HomeController::class, 'updatePartnerStatus']
);

Route::get(
    '/vendorkyc/{id}',
    [App\Http\Controllers\HomeController::class, 'vendorkycData']
);

Route::get(
    '/orders',
    [App\Http\Controllers\HomeController::class, 'orders']
);

Route::get(
    '/all-orders',
    [App\Http\Controllers\HomeController::class, 'getAllOrders']
);

Route::get(
    '/all-orders/{id}',
    [App\Http\Controllers\HomeController::class, 'getOrders']
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
    '/partnerreviews/{id}',
    [App\Http\Controllers\HomeController::class, 'deliveryPartnerReviews']
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
    '/vendorreviews/{id}',
    [App\Http\Controllers\HomeController::class, 'vendorReviews']
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
    '/addProductCategory',
    [App\Http\Controllers\HomeController::class, 'addProductCategory']
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
    '/getAllMarketProducts',
    [App\Http\Controllers\HomeController::class, 'Marketproducts']
);

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

Route::Post(
    '/addProductCategory',
    [App\Http\Controllers\HomeController::class, 'insertProductCategory']
)->name('InsertProductCategory');

Route::get(
    '/addSlider',
    [App\Http\Controllers\HomeController::class, 'addSlider']
);

Route::Post(
    '/addSlider',
    [App\Http\Controllers\HomeController::class, 'insertSlider']
)->name('InsertSlider');

Route::GET(
    '/deleteSlider/{id}',
    [App\Http\Controllers\HomeController::class, 'deleteSlider']
);

Route::GET(
    '/deleteCategory/{id}',
    [App\Http\Controllers\HomeController::class, 'deleteCategory']
);

Route::GET(
    '/deleteProductCategory/{id}',
    [App\Http\Controllers\HomeController::class, 'deleteProductCategory']
);

Route::GET(
    '/getCategory/{id}',
    [App\Http\Controllers\HomeController::class, 'getCategory']
);

Route::POST(
    '/updateCategory/{id}',
    [App\Http\Controllers\HomeController::class, 'updateCategory']
);

Route::GET(
    '/getProductCategory/{id}',
    [App\Http\Controllers\HomeController::class, 'getProductCategory']
);

Route::POST(
    '/updateProductCategory/{id}',
    [App\Http\Controllers\HomeController::class, 'updateProductCategory']
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
    '/addcod',
    [App\Http\Controllers\HomeController::class, 'addCOD']
);

Route::POST(
    '/addcouponcode',
    [App\Http\Controllers\HomeController::class, 'addCouponCode']
);


Route::POST(
    '/addservicecharge',
    [App\Http\Controllers\HomeController::class, 'addServiceCharge']
);

Route::POST(
    '/adddeliveryservicecharge',
    [App\Http\Controllers\HomeController::class, 'addDeliveryServiceCharge']
);

Route::get(
    '/addVehicle',
    [App\Http\Controllers\HomeController::class, 'addVehicle']
);

Route::post(
    '/addVehicle',
    [App\Http\Controllers\HomeController::class, 'insertVehicle']
)->name('InsertVehicle');

Route::GET(
    '/getVehicle/{id}',
    [App\Http\Controllers\HomeController::class, 'getVehicle']
);

Route::GET(
    '/getMarketProduct/{id}',
    [App\Http\Controllers\HomeController::class, 'getMarketProduct']
);


Route::POST(
    '/updateVehicle/{id}',
    [App\Http\Controllers\HomeController::class, 'updateVehicle']
);

Route::POST(
    '/updateMarketProduct/{id}',
    [App\Http\Controllers\HomeController::class, 'updateMarketProduct']
);


Route::GET(
    '/deleteVehicle/{id}/{status}',
    [App\Http\Controllers\HomeController::class, 'deleteVehicle']
);

Route::get(
    '/marketProductsOrders',
    [App\Http\Controllers\HomeController::class, 'marketProductsOrders']
);