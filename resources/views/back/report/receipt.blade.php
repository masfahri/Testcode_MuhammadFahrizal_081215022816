<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .receipt{
            width: 500px;
        }
    </style>

</head>
<body>

    <div class="receipt">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>{{auth()->user()->name}}</h3>
                    <h6>{{auth()->user()->roles[0]->name}}</h6>
                </div>
            </div>

            <div class="card-body">


                <div class="card-header bg-secondry color-palette">
                    <h6 class="card-title">Bukti Transaksi</h6>
                </div>

                <div class="card-body">
                    <table class="table table-condensed"  width="100%">
                        <tbody>
                            <tr>
                                <td>No. Invoice</td>
                                <td class="text-primary strong">{{$data->invoice}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td colspan="3">{{date('d M y', strtotime($data->created_at))}}, {{date('H:i', strtotime($data->created_at))}}</td>

                            </tr>
                            <tr>
                                <td>Nama Customer</td>
                                <td colspan="2">{{$data->nama_pelanggan}}</td>
                                <td></td>
                            </tr>

                            @foreach ($data->Detail as $item)
                                <tr>
                                    <td>{{$item->Item->nama}}</td>
                                    <td>{{number_format($item->Item->harga)}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{number_format($item->subtotal)}}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td><b> Total</b></td>
                                <td></td>
                                <td></td>
                                <td><b> Rp. {{number_format($data->total_bayar)}} </b></td>
                            </tr>
                            <tr>
                                <td><b> Jumlah Bayar </b></td>
                                <td></td>
                                <td></td>
                                <td><b> Rp. {{number_format($data->bayar)}} </b></td>
                            </tr>
                            <tr>
                                <td><b> Kembalian</b></td>
                                <td></td>
                                <td></td>
                                <td><b> Rp. {{number_format($data->bayar - $data->total_bayar)}} </b></td>
                            </tr>

                            <tr>
                                <td colspan="2" class="text-center"><p>Terima Kasih Atas Kunjungan Anda</p></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
