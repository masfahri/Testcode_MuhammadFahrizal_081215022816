<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                @foreach ($thead as $item)
                <th>{{$item}}</th>
                @endforeach
                <th width="280px">Action</th>
              </tr>
            </thead>
            <tfoot>
                <tr>
                    @foreach ($thead as $item)
                    <th>{{$item}}</th>
                    @endforeach
                    <th width="280px">Action</th>
                  </tr>
            </tfoot>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <td>{{$item->kode_item}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->harga}}</td>
                <td>{{$item->flag}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.item.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('admin.item.edit',$item->id) }}">Edit</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['admin.item.destroy', $item->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
      </div>
    </div>
  </div>
