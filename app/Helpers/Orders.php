<?php

use App\Constants\Flag;
use App\Models\Item;
use App\Models\Order;

if (!function_exists('GetAllOrders')) {

    /**
     * Get All Orders
     *
     * @param
     * @return
     */
    function GetAllOrders($date = null)
    {
        $data = Order::all();
        return $data;
    }
}

if (!function_exists('GetAmountAllOrders')) {

    /**
     * Get Amount All Orders
     *
     * @param
     * @return
     */
    function GetAmountAllOrders($date = null)
    {
        $data = Order::get()->sum('total_bayar');
        return number_format($data, 2, ',', '.');
    }
}

if (!function_exists('OrderisActive')) {

    /**
     * Get Amount All Orders
     *
     * @param
     * @return
     */
    function OrderisActive()
    {
        $data = Order::whereFlag(Flag::ORDER_ACTIVE)->count();
        return $data;
    }
}

if (!function_exists('ItemisActive')) {

    /**
     * Get Amount All Orders
     *
     * @param
     * @return
     */
    function ItemisActive()
    {
        $data = Item::whereFlag(Flag::ITEM_ACTIVE)->count();
        return $data;
    }
}

if (!function_exists('GetAllMenus')) {

    /**
     * Get Amount All Orders
     *
     * @param
     * @return
     */
    function GetAllMenus()
    {
        $data = Item::whereFlag(Flag::ITEM_ACTIVE)->count();
        return $data;
    }
}

