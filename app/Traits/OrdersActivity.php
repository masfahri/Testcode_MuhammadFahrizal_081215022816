<?php

namespace App\Traits;

use App\Services\AutoIncrementServices;

/**
 * All Activity of Orders
 */
trait OrdersActivity
{
    /**
     * Generate new Invoice Number
     *
     * @param Collection $model
     * @param String $field
     * @param String $prefix
     * @param Integer $length
     * @return void
     */
    public function GenerateInvoiceNumber($model, $prefix, $length)
    {
        count($model::all()) == 0 ? $data = 0 : $data = $model::latest('invoice')->first()->invoice;
        return AutoIncrementServices::handleIncrement(['data' => $data, 'prefix' => $prefix, 'length' => $length]);
    }

    /**
     * Generate new Order Number
     *
     * @param Collection $model
     * @param String $field
     * @param String $prefix
     * @param Integer $length
     * @return void
     */
    public function GenerateOrderNumber($model, $prefix, $length)
    {
        count($model::all()) == 0 ? $data = 0 : $data = $model::latest('invoice',)->first()->invoice;
        return AutoIncrementServices::handleIncrement(['data' => $data, 'prefix' => $prefix, 'length' => $length]);
    }
}
