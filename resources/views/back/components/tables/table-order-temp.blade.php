<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daftar {{$pageTitle}}</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                @foreach ($thead as $item)
                <th class="text-center">{{$item}}</th>
                @endforeach
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->Item->nama}}</td>
                    <td>{{$item->qty}}</td>
                    <td>Rp. {{number_format($item->Item->harga, 2, ",", ".")}}</td>
                    <td>Rp. {{number_format($item->Item->harga * $item->qty, 2, ",", ".")}}</td>
                    <td>
                        <button type="button" id="{{$item->id}}" name="{{$item->id}}" onclick="deleteRecord(this.id,this)" data-token="{{ csrf_token() }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" style="text-align:right">Total:</th>
                    <th>:</th>
                    <th>Rp. {{number_format($subtotal, 2, ",", ".")}}</th>
                </tr>
            </tfoot>
          </table>
      </div>
    </div>
  </div>

