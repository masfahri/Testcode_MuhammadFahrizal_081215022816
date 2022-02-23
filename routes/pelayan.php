<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderTempController;
use App\Http\Controllers\PembayaranController;

Route::name('pelayan.')->prefix('pelayan/')->group(function () {
    Route::group(['middleware' => ['role:pelayan|kasir', 'auth']], function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('order', OrderController::class);
        Route::resource('order-temp', OrderTempController::class);
        Route::get('list-order/index', [OrderController::class, 'ListOrder'])->name('list-order.index');

        Route::get('order/{order}/receipt', [OrderController::class, 'receipt'])->name('receipt.show');
    });
});
