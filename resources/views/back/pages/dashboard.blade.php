@extends('back.layouts.app')


@section('content')
<!-- Container Fluid-->
{!! Form::hidden('test', $total_bayar, ['class' => 'form-control']) !!}
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings All</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{GetAmountAllOrders()}}</div>
                            {{-- <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span>Since last month</span>
                            </div> --}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{GetAllOrders()->count()}}</div>
                            {{-- <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span>Since last years</span>
                            </div> --}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Order Is Active Now</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{OrderisActive()}}</div>
                            {{-- <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                                <span>Since last month</span>
                            </div> --}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Menus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{GetAllMenus()}}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> {{ItemisActive()}}</span>
                                <span>Is Active</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Recap Report</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Menu Sold</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Month <i class="fas fa-chevron-down"></i>
                        </a>
                        {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Select Periode</div>
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Week</a>
                            <a class="dropdown-item active" href="#">Month</a>
                            <a class="dropdown-item" href="#">This Year</a>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    {!!GetAllItems($items)!!}
                    {{-- @foreach ($items as $item)
                    @endforeach --}}
                </div>
                <div class="card-footer text-center">
                    <a class="m-0 small text-primary card-link" href="#">View More <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <!-- Invoice Example -->
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
                    <a class="m-0 float-right btn btn-danger btn-sm" href="#">View More <i
                            class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Item</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr>
                                <td><a href="#">{{$order->invoice}}</a></td>
                                <td>{{$order->nama_pelanggan}}</td>
                                <td>
                                    <ul>
                                        @foreach ($order->Detail as $detail)
                                            <li>{{App\Models\Item::whereKodeItem($detail->kode_item)->first()->nama}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td><span class="badge badge-{{$order->flag == 'aktif' ? 'success' : 'danger'}}">{{$order->flag}}</span></td>
                            </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->

    <div class="row">
        <div class="col-lg-12 text-center">
            <p>Do you like this template ? you can download from <a href="https://github.com/indrijunanda/RuangAdmin"
                    class="btn btn-primary btn-sm" target="_blank"><i class="fab fa-fw fa-github"></i>&nbsp;GitHub</a>
            </p>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->
@endsection