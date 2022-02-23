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
              </tr>
            </thead>
            <tfoot>
                <tr>
                    @foreach ($thead as $item)
                    <th>{{$item}}</th>
                    @endforeach
                  </tr>
            </tfoot>
            <tbody>
              @foreach ($data as $item)
              <tr align="center">
                <td>{{$item->user->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
              </tr>
              @endforeach

            </tbody>
          </table>
      </div>
    </div>
  </div>
