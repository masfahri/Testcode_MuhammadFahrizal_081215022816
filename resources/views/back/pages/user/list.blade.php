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
    <div class="row mb-3">
        <div class="col-xl-12 col-md-12 col-lg-12">
            @component('back.components.tables.table-activity', [
                'pageTitle' => $pageTitle,
                'data' => $activity_log,
                'thead' => ['Nama User', 'Activity', 'Riwayat']
            ])
            @endcomponent
        </div>
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
