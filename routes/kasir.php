<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderTempController;
use App\Http\Controllers\PembayaranController;

Route::name('kasir.')->prefix('kasir/')->group(function () {
    Route::group(['middleware' => ['role:kasir', 'auth']], function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('order', OrderController::class);
        Route::resource('pembayaran', PembayaranController::class);
        Route::get('list-order/index', [OrderController::class, 'ListOrder'])->name('list-order.index');
    });
});
