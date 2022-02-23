<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daftar {{$pageTitle}}</h6>
        <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('pelayan.order-temp.create', )}}">Tambah Pesanan</a></h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                @foreach ($thead as $item)
                <th class="text-center">{{$item}}</th>
                @endforeach
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tfoot>
                <tr>
                    @foreach ($thead as $item)
                    <th>{{$item}}</th>
                    @endforeach
                    <th class="text-center">Action</th>
                  </tr>
            </tfoot>
            <tbody>
              @foreach ($data as $item)
              <tr align="center">
                <td>{{$item->invoice}}</td>
                <td>{{$item->nama_pelanggan.' ('.$item->nomor_meja.') '}}</td>
                <td>Rp.{{number_format($item->total_bayar,2,',','.')}}</td>
                <td>Rp.{{number_format($item->bayar,2,',','.')}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('pelayan.order.show',$item->id) }}"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-primary" href="{{ route('pelayan.order.edit',$item->id) }}"><i class="fas fa-plus"></i></a>
                    @if (auth()->user()->hasRole('kasir'))
                        {!! Form::open(['method' => 'DELETE','route' => ['kasir.pembayaran.store', $item->id],'style'=>'display:inline']) !!}
                            {!! Form::button('<i class="fas fa-money-check"></i>', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
      </div>
    </div>
  </div>
