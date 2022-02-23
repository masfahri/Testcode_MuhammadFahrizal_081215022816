@extends('back.layouts.app')

@section('css-third')
<link href="{{ asset('v2/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')
<div class="row-mb-4">
    <div class="col-sm-12">
        <div class="float-right">
            <input type="button" class="btn btn-primary" id="print" onclick="printreceipt()" value="Cetak Nota">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Detail Transaksi</h3>
            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td>No. Invoice</td>
                            <td class="text-primary strong">{{$order->invoice}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>{{date('j F Y', strtotime($order->created_at))}}</td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td>{{$order->nama_pelanggan}}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Rp. {{number_format($order->total_bayar)}}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Bayar</td>
                            <td>Rp. {{number_format($order->bayar)}}</td>
                        </tr>
                        <tr>
                            <td>Kembalian</td>
                            <td>Rp. {{number_format($order->bayar - $order->total_bayar)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menu Yang di Pesan</h3>
            </div>

            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nama Menu</td>
                            <td>Harga</td>
                            <td>Qty</td>
                            <td>Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=0;
                        @endphp

                        @foreach ($order->Detail as $item)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$item->Item->nama}}</td>
                                <td>{{number_format($item->item->harga)}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{number_format($item->sub_total)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-right">Total Harga :</th>
                            <th>{{number_format($order->total_bayar)}}</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Bayar :</th>
                            <th>{{number_format($order->bayar)}}</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Kembalian :</th>
                            <th>{{number_format($order->bayar - $order->total_bayar)}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->
@endsection

@section('js-third')

  <!-- Page level plugins -->
<script src="{{ asset('v2/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('v2/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    function printreceipt(){
        var URL = "{{route('pelayan.receipt.show', $order->order_id)}}";
        var W = window.open(URL);
        W.window.print();
    }
</script>

@endsection
