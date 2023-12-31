<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCardTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPhotoController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPaymentCardController;
use App\Http\Controllers\UserPhotoController;
use App\Http\Controllers\UserSettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('products/{product}/similar', [ProductController::class, 'similar']);

Route::post('roles/assign', [RoleController::class, 'assign']);
Route::post('permissions/assign', [PermissionController::class, 'assign']);

//Status bo'yicha Mail ga jo'natilgan notification lar ni tekshirish uchun route
/*Route::get('test', function(){
    $order = \App\Models\Order::find(1);
    $order->update(['status_id' => 9]);
    dd($order->status_id);

//    dd($class($order));
});*/


Route::apiResources([
    'users' => UserController::class,
    'roles' => RoleController::class,
    'photos' => PhotoController::class,
    'orders' => OrderController::class,
    'reviews' => ReviewController::class,
    'statuses' => StatusController::class,
    'products' => ProductController::class,
    'settings' => SettingController::class,
    'discounts' => DiscountController::class,
    'favorites' => FavoriteController::class,
    'categories' => CategoryController::class,
    'permissions' => PermissionController::class,
    'users.photos' => UserPhotoController::class,
    'user-settings' => UserSettingController::class,
    'payment-types' => PaymentTypeController::class,
    'user-addresses' => UserAddressController::class,
    'statuses.orders' => StatusOrderController::class,
    'products.photos' => ProductPhotoController::class,
    'products.reviews' => ProductReviewController::class,
    'delivery-methods' => DeliveryMethodController::class,
    'user-payment-cards' => UserPaymentCardController::class,
    'payment-card-types' => PaymentCardTypeController::class,
    'categories.products' => CategoryProductController::class,
]);
