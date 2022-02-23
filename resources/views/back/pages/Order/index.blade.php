@extends('back.layouts.app')

@section('css-third')
<link href="{{ asset('v2/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$pageTitle}}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
        </ol>
    </div>


    <div class="col-xl-12 col-md-12 col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @component('back.components.forms.form-order-temps', [
                    'data' => $items,
                    'active' => $active
                ])

                @endcomponent
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-xl-8 col-md-8 col-lg-12">
            @component('back.components.tables.table-order-temp', [
                'pageTitle' => $pageTitle,
                'data' => $order_temps,
                'subtotal' => $subtotal_orderTemps,
                'active' => $active,
                'thead' => ['Nama Item', 'Jumlah Pesan', 'Harga Item', 'Total Bayar & Bayar']
            ])
            @endcomponent
        </div>

        @if (auth()->user()->hasRole('kasir'))
            <div class="col-xl-4 col-md-4 col-lg-12">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @component('back.components.forms.form-order', [
                            'subtotal' => $subtotal_orderTemps,
                            'data' => $items,
                            'meja' => $meja,
                        ])

                        @endcomponent
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!--Row-->

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


@endsection
