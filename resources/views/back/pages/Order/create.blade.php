@extends('back.layouts.app')

@section('css-third')
<link href="{{ asset('v2/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection__rendered {
        line-height: 45px !important;
    }
    .select2-container .select2-selection--single {
        height: 45px !important;
    }
    .select2-selection__arrow {
        height: 45px !important;
    }
</style>
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

    <div class="row mb-3">

        <div class="col-xl-4 col-md-4 col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Master Role</h6>
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
        <div class="col-xl-8 col-md-8 col-lg-12">
            @component('back.components.tables.table-order-temp', [
                'thead' => ['Nomor Meja', 'Nama Menu', 'Harga Menu', 'Total Harga'],
                'pageTitle'  => $pageTitle,
            ])

            @endcomponent
        </div>
        {{-- <a href="#" onclick="listGroup('ZueuCnxsyour')">Cek Group</a> --}}
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->
@endsection

@section('js-third')
  <!-- Page level plugins -->
<script src="{{ asset('v2/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('v2/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kode_item').select2();
    });
</script>
@endsection
