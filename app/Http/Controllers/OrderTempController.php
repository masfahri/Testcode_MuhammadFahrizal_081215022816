<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Constants\Flag;
use App\Models\OrderTemp;
use Illuminate\Http\Request;
use App\Traits\OrdersActivity;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TempOrderRequest;

class OrderTempController extends Controller
{
    use OrdersActivity;

    public function __construct() {
        $this->pageTitle = 'Tambah Item Order';
        $this->aktif = Flag::ITEM_ACTIVE;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OrderTemp $orderTempModel)
    {
        $order_id = $this->getLastCode($orderTempModel, 'order_id', 'PSN-', 4);

        $pageTitle = $this->pageTitle;
        $items = Item::all();
        $active = $this->aktif;

        return view('back.pages.Order.create', compact('pageTitle', 'items', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TempOrderRequest $request, OrderTemp $orderTemp)
    {
        $orderTemp = new OrderTemp();
        $item = Item::where('kode_item', $request->kode_item)->first();
        $sub_total = $item->harga * $request->qty;
        $request['sub_total'] = $sub_total;
        $order_id = !empty($request->segment) ? Order::find($request->segment)->id : $this->GenerateOrderNumber(Order::class, 'PSN-', 4);
        if ($request->validated()) {
            try {
                DB::beginTransaction();
                $orderTemp::create([
                    'order_id' => $order_id,
                    'kode_item' => $request->kode_item,
                    'qty' => $request->qty,
                    'sub_total' => $sub_total,
                ]);
                DB::commit();
                activity()->log('Menambahkan Pesanan Ke Temporer Order');
                return redirect()->route('pelayan.order.index')->with('success', 'Item baru dengan nama '.$request->nama.' Berhasil Dipesan');
            } catch (\Throwable $th) {
                DB::rollback();
                activity()->log('error: '.$th->getMessage());
                return redirect()->back()->with('error', $th->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderTemp  $OrderTemp
     * @return \Illuminate\Http\Response
     */
    public function show(OrderTemp $OrderTemp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderTemp  $OrderTemp
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderTemp $OrderTemp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderTemp  $OrderTemp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderTemp $OrderTemp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderTemp  $OrderTemp
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderTemp $OrderTemp, $id)
    {

    }
}
