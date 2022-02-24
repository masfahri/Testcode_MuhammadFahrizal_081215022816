<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct(Order $order) {
        $this->order = $order;
    }
    public function index()
    {
        $items = Item::get();
        $orders = Order::limit(5)->get();
        return view('back.pages.dashboard', [
            'total_bayar' => $this->order->GetAmount(),
            'items' => $items,
            'orders' => $orders
        ]);
    }
    
}
