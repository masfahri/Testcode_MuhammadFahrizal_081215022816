<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Meja;
use App\Models\Order;
use App\Constants\Flag;
use App\Models\OrdeTemp;
use App\Models\OrderTemp;
use Illuminate\Http\Request;
use App\Models\ViewTotalHarga;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use App\Models\OrderDetail;
use App\Models\ViewTotalHargabyIDFromOrders;
use App\Traits\OrdersActivity;

class OrderController extends Controller
{
    use OrdersActivity;

    public function __construct() {
        $this->pageTitle = 'Order';
        $this->itemAktif = Flag::ITEM_ACTIVE;
        $this->mejaAktif = Flag::ITEM_ACTIVE;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtotal_orderTemps = ViewTotalHarga::first()->subtotal;
        $items = Item::all();
        $order_temps = OrderTemp::all();
        $pageTitle = $this->pageTitle;
        $active = $this->itemAktif;
        $meja = Meja::where('flag', 'avail')->pluck('nomor_meja', 'id');
        activity()->log('Melihat Semua Pesanan Aktif');
        return view('back.pages.Order.index', compact('subtotal_orderTemps', 'pageTitle', 'active', 'items', 'meja', 'order_temps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request, Order $orderModel, OrderTemp $orderTemp)
    {
        try {
            DB::beginTransaction();
            $orderTemps = $orderTemp::get();
            $invoice = $this->GenerateInvoiceNumber(Order::class, 'PSN'.date('Ymd').'-', 12);
            $orderModel->user_id = auth()->user()->id;
            $orderModel->invoice = $invoice;
            $orderModel->nama_pelanggan = $request->nama_pelanggan;
            $orderModel->total_bayar = $request->subtotal;
            $orderModel->bayar = $request->jumlah_bayar;
            $orderModel->catatan = $request->catatan;
            $orderModel->nomor_meja = $request->nomor_meja;
            $orderModel->flag = Flag::ORDER_ACTIVE;
            $orderModel->save();
            
            foreach ($orderTemps as $item) {
                $orderDetailModel = new OrderDetail;
                $orderDetailModel->order_id = $orderModel->id;
                $orderDetailModel->kode_item = $item->kode_item;
                $orderDetailModel->qty = $item->qty;
                $orderDetailModel->subtotal = $item->sub_total;
                $orderDetailModel->save();
                
            };
            Meja::find($request->nomor_meja)->update([
                'flag' => Flag::MEJA_RSRVD
            ]);


            OrderTemp::truncate();
            // ViewTotalHarga::truncate();
            activity()->log('Menambahkan Pesanan');
            DB::commit();
            return redirect()->route('pelayan.receipt.show',$orderModel->id)->with('success', 'Pesanan Telah Dibuat');
        } catch (\Throwable $th) {
            DB::rollback();
            activity('error')->log('message: '.$th->getMessage().'line: '.$th->getLine());
            dd($th->getMessage());
            return redirect()->route('pelayan.order.index')->with('Error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $total_harga = ViewTotalHargabyIDFromOrders::where('user_id', auth()->user()->id)->first();
        activity()->log('Melihat Pesanan ');
        return view('back.pages.Order.show', compact('order', 'total_harga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $subtotal_orderTemps = ViewTotalHarga::first()->subtotal;
        $items = Item::all();
        
        $order_temps = OrderDetail::whereOrderId($order->order_id);
        $pageTitle = $this->pageTitle;
        $active = $this->itemAktif;
        $meja = Meja::where('flag', 'avail')->pluck('nomor_meja', 'id');
        return view('back.pages.Order.index', [
            'subtotal_orderTemps' => $subtotal_orderTemps, 
            'pageTitle' => $pageTitle, 
            'active'=> $active, 
            'items' => $items,  
            'meja' => $meja,
            'order_temps' => $order_temps->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Get All Order List
     *
     * @param \App\Model\Order $order
     * @return
     */
    public function ListOrder(Order $order)
    {
        auth()->user()->hasRole('pelayan')
            ? $orders = $order::where('user_id', auth()->user()->id)->get()
            : $orders = $order::all();
        $pageTitle = 'List Pesanan';
        activity()->log('Melihat Semua Pesanan ');
        return view('back.pages.Order.list', compact('orders', 'pageTitle'));
    }

    public function receipt($id)
    {
        $data = Order::find($id);
        return view('back.report.receipt', compact('data'));
    }
}
