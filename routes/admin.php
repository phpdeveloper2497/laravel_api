<?php


use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\AnalysisController;
use Illuminate\Support\Facades\Route;


Route::prefix('analysis')->group(function () {
    Route::get('orders-count', [AnalysisController::class, 'orderCount']);
    Route::get('orders-sales-sum', [AnalysisController::class, 'orderSalesSum']);
    Route::get('delivery-methods-ratio', [AnalysisController::class, 'deliveryMethodsRatio']);
    Route::get('orders-count-by-day', [AnalysisController::class, 'ordersCountByDays']);
});

Route::apiResource('orders', AdminOrderController::class);


