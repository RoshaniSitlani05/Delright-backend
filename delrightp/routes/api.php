<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalDetailsController ;
use App\Http\Controllers\PersonalDetailsDelController ;
use App\Http\Controllers\EmergencyDetailsController;
use App\Http\Controllers\EmergencyDetailsDelController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BankDelController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\DocumentsDelController;
use App\Http\Controllers\VehicleDetailsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::POST(
    'signUp',
    [App\Http\Controllers\AuthController::class, 'register']
);

Route::POST(
    'signIn',
    [App\Http\Controllers\AuthController::class, 'login']
);
Route::POST(
    'signOut',
    [App\Http\Controllers\AuthController::class, 'logoutApi']
);
Route::POST(
    'check',
    [App\Http\Controllers\AuthController::class, 'check']
);
Route::POST(
    'registerWithFireBase',
    [App\Http\Controllers\AuthController::class, 'registerWithFireBase']
);

//forgot password
Route::GET('getcod', [App\Http\Controllers\AuthController::class, 'getCOD']);

Route::POST(
    'test',
    [App\Http\Controllers\AuthController::class, 'test']
);

Route::POST(
    'storeOtp',
    [App\Http\Controllers\AuthController::class, 'storeOtp']
);
Route::POST(
    'checkotp',
    [App\Http\Controllers\AuthController::class, 'checkotp']
);

Route::POST(
    'reset',
    [App\Http\Controllers\AuthController::class, 'reset']
);



Route::GET('categoires', [App\Http\Controllers\ApiController::class, 'category']);
Route::GET('productCategories', [App\Http\Controllers\ApiController::class, 'Productcategory']);

Route::POST('addProduct', [App\Http\Controllers\ProductController::class, 'addProduct'])
    ->middleware('auth:api');

Route::GET('displayMyProducts', [App\Http\Controllers\ProductController::class, 'displayMyProducts'])
    ->middleware('auth:api');

Route::POST('updateMyProduct', [App\Http\Controllers\ProductController::class, 'updateMyProducts'])
    ->middleware('auth:api');

Route::DELETE('deleteMyProduct/{id}', [App\Http\Controllers\ProductController::class, 'deleteMyProducts'])
    ->middleware('auth:api');

Route::POST('deleteMyProductsImage', [App\Http\Controllers\ProductController::class, 'deleteMyProductsImage'])
    ->middleware('auth:api');

//Vendor details
Route::POST('addVendorDetails', [App\Http\Controllers\VendorController::class, 'addDetails'])
    ->middleware('auth:api');

Route::GET('vendorMyDetails', [App\Http\Controllers\VendorController::class, 'getDetails'])
    ->middleware('auth:api');

Route::GET('vendorDetails/{id}', [App\Http\Controllers\VendorController::class, 'getVendorDetails'])
    ->middleware('auth:api');

Route::POST('updateVendorDetails', [App\Http\Controllers\VendorController::class, 'updateDetails'])
    ->middleware('auth:api');



//User



Route::GET('allProducts', [App\Http\Controllers\ProductUserController::class, 'displayAllProducts']);
Route::GET('displaySinlgeProduct/{id}', [App\Http\Controllers\ProductUserController::class, 'displaySinlgeProduct']);
Route::GET(
    'getRatings/{id}',
    [App\Http\Controllers\ProductUserController::class, 'getRatings']
);

Route::GET(
    'productsShopByCategory/{cate}/{id}',
    [App\Http\Controllers\ProductUserController::class, 'productsBycategoryShop']
);

Route::GET(
    'vendorList/{id}',
    [App\Http\Controllers\VendorController::class, 'vendorDetails']
);

Route::POST(
    'addUserDetails',
    [App\Http\Controllers\UserController::class, 'addUserDetails']
);

Route::GET(
    'userMyDetails',
    [App\Http\Controllers\UserController::class, 'getMyDetails']
);

Route::POST(
    'updateUserDetails',
    [App\Http\Controllers\UserController::class, 'updateUserDetails']
);


// Order Product

Route::POST(
    'orderProduct',
    [App\Http\Controllers\OrderController::class, 'orderProduct']
);
Route::GET(
    'exsitingAddress',
    [App\Http\Controllers\OrderController::class, 'exsitingAddress']
);
Route::POST(
    'addaddress',
    [App\Http\Controllers\OrderController::class, 'Addaddress']
);
Route::POST(
    'confirmAddress',
    [App\Http\Controllers\OrderController::class, 'confirmAddress']
);
Route::POST(
    'confirmPayment',
    [App\Http\Controllers\OrderController::class, 'confirmPayment']
);

Route::GET(
    'myOrders',
    [App\Http\Controllers\OrderController::class, 'myOrders']
);
Route::GET(
    'getMyOrdersVendor',
    [App\Http\Controllers\VendorController::class, 'getMyOrders']
);
Route::GET(
    'myOrderInfo/{id}',
    [App\Http\Controllers\OrderController::class, 'myOrderInfo']
);
Route::GET(
    'orderStatus/{id}',
    [App\Http\Controllers\OrderController::class, 'orderStatus']
);

Route::POST(
    'orderStatusUpdateVendor',
    [App\Http\Controllers\OrderController::class, 'orderStatusUpdateVendor']
);
Route::POST(
    'orderCancel/{id}',
    [App\Http\Controllers\OrderController::class, 'orderCancelApi']
);


//Cart 
Route::POST(
    'addToCart',
    [App\Http\Controllers\CartController::class, 'addToCart']
);
Route::GET(
    'myCart',
    [App\Http\Controllers\CartController::class, 'myCart']
);
Route::DELETE(
    'deleteFromCart/{id}',
    [App\Http\Controllers\CartController::class, 'deleteFromCart']
);

//Favourites
Route::POST(
    'addToFavourites',
    [App\Http\Controllers\CartController::class, 'addToFavourites']
);
Route::GET(
    'myFavourites',
    [App\Http\Controllers\CartController::class, 'myFavourites']
);
Route::DELETE(
    'deleteFromFavourites/{id}',
    [App\Http\Controllers\CartController::class, 'deleteFromFavourites']
);
Route::DELETE(
    'removeFromCart',
    [App\Http\Controllers\CartController::class, 'deleteFromCartUser']
);


//Vendor dashbords 
Route::GET(
    'dashboard',
    [App\Http\Controllers\VendorController::class, 'dashboard']
);
Route::GET(
    'allOrders',
    [App\Http\Controllers\VendorController::class, 'allOrders']
);
Route::GET(
    'allSuccessOrders',
    [App\Http\Controllers\VendorController::class, 'allSuccessOrders']
);
Route::GET(
    'allPendingOrders',
    [App\Http\Controllers\VendorController::class, 'allPendingOrders']
);
Route::GET(
    'allCancelledOrders',
    [App\Http\Controllers\VendorController::class, 'allCancelledOrders']
);


//Rating 
Route::POST(
    'addRating',
    [App\Http\Controllers\CartController::class, 'addRating']
);
Route::POST(
    'updateRating',
    [App\Http\Controllers\CartController::class, 'updateRating']
);
Route::DELETE(
    'deleteRating/{id}',
    [App\Http\Controllers\CartController::class, 'deleteRating']
);

//Search and filter
Route::POST(
    'search',
    [App\Http\Controllers\ProductUserController::class, 'search']
);
Route::POST(
    'filterProduct',
    [App\Http\Controllers\ProductUserController::class, 'filter']
);
Route::GET(
    'similerProducts/{id}',
    [App\Http\Controllers\ProductUserController::class, 'similerProducts']
);
Route::GET(
    'productsByCategory/{id}',
    [App\Http\Controllers\ProductUserController::class, 'productsByCategory']
);
Route::GET(
    'notifications',
    [App\Http\Controllers\ApiController::class, 'notifications']
)->middleware('auth:api');



Route::get(
    'market_prducts/{id}',
    [App\Http\Controllers\MarketController::class, 'ProductsByCare']
)->middleware('auth:api');


//Cart 
Route::POST(
    'market_addToCart',
    [App\Http\Controllers\MarketController::class, 'addToCart']
);
Route::GET(
    'market_myCart',
    [App\Http\Controllers\MarketController::class, 'myCart']
);
Route::DELETE(
    'market_deleteFromCart/{id}',
    [App\Http\Controllers\MarketController::class, 'deleteFromCart']
);


//Order Order
Route::POST(
    'market_orderProduct',
    [App\Http\Controllers\MarketController::class, 'orderProduct']
);
Route::POST(
    'market_confirmPayment',
    [App\Http\Controllers\MarketController::class, 'confirmPayment']
);
Route::GET(
    'market_myOrders',
    [App\Http\Controllers\MarketController::class, 'myOrders']
);
Route::POST(
    'market_orderCancel/{id}',
    [App\Http\Controllers\MarketController::class, 'orderCancelApi']
);

Route::POST(
    'addFeedback',
    [App\Http\Controllers\ApiController::class, 'addFeedback']
)->middleware('auth:api');

Route::POST(
    'addDelFeedback',
    [App\Http\Controllers\PersonalDetailsDelController::class, 'addDelFeedback']
);

Route::post('getInTouch', 'App\Http\Controllers\PersonalDetailsDelController@addGetInTouch');

Route::apiResource('personalDetails', PersonalDetailsController::class);
Route::post('/deleteUser/{id}', 'App\Http\Controllers\PersonalDetailsController@deleteUser');

Route::post('/personalDetails/update', 'App\Http\Controllers\PersonalDetailsController@update');
Route::get('profilepercent', 'App\Http\Controllers\PersonalDetailsController@profilePercent');

Route::apiResource('personalDetailsDel', PersonalDetailsDelController::class);
Route::post('/deleteUserDel/{id}', 'App\Http\Controllers\PersonalDetailsDelController@deleteUser');

Route::post('/personalDetailsDel/update', 'App\Http\Controllers\PersonalDetailsDelController@update');
Route::get('profilepercentDel', 'App\Http\Controllers\PersonalDetailsDelController@profilePercent');



Route::apiResource('contact', EmergencyDetailsController::class);
Route::post('/contact/update', 'App\Http\Controllers\EmergencyDetailsController@update');

Route::apiResource('contactDel', EmergencyDetailsDelController::class);
Route::post('/contactDel/update', 'App\Http\Controllers\EmergencyDetailsDelController@update');

Route::apiResource('bank', BankController::class);
Route::post('/bank/update', 'App\Http\Controllers\BankController@update');

Route::apiResource('bankDel', BankDelController::class);
Route::post('/bankDel/update', 'App\Http\Controllers\BankDelController@update');

Route::apiResource('documents', DocumentsController::class);
Route::post('/documents/update', 'App\Http\Controllers\DocumentsController@update');

Route::apiResource('documentsDel', DocumentsDelController::class);
Route::post('/documentsDel/update', 'App\Http\Controllers\DocumentsDelController@update');

Route::apiResource('vehicledocuments', VehicleDetailsController::class);
Route::post('/vehicledocuments/update', 'App\Http\Controllers\VehicleDetailsController@update');

Route::apiResource('shop', ShopController::class);
Route::post('/shop/update', 'App\Http\Controllers\ShopController@update');

