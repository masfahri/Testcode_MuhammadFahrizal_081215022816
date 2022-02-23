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
                <td>{{$item->kode}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->Kecamatan->nama}}</td>
                <td>
                    <input
                        type="checkbox"
                        name="flag"
                        id=""
                        onclick="updateFlag({{$item->id}}, this)" {{$item->flag == 'active' ? 'checked' : '' }} value='active'>
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('kelurahan.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('kelurahan.edit',$item->id) }}">Edit</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['kelurahan.destroy', $item->id],'style'=>'display:inline']) !!}
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
@section('js-third')
<script>
function updateFlag(params, check) {
console.log(check.checked)
if (check.checked) {
    var flag = 'active'
}else{
    var flag = 'de-active'
}
$.ajax({
    type: "POST",
    url: "{{route('apis.kelurahan.update-flag')}}",
    data: {
        _token: '{{ csrf_token() }}',
        id: params,
        flag: flag
    },
    dataType: "json",
    success: function (response) {
        if (response.success) {
            alert('Flag terubah')
            window.location.href = "{{route('kelurahan.index')}}";
        }
    }
});
}
</script>
@endsection
