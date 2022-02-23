<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\OrderTempController;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

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

    Route::get('item/{kd_item}/show', [ItemController::class, 'show'])->name('api.item.show');
    Route::delete('order-temp/{id}/destroy', [OrderTempController::class, 'destroy'])->name('api.order-temp.destroy');
