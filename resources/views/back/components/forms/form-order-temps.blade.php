<form method="POST" action="{{ route('pelayan.order-temp.store') }}">
    @csrf
    {!! Form::hidden('segment', request()->segment(3), [null]) !!}
    <div class="form-group">
        <label for="namaRole">Menu</label>
        <select class="form-control" name="kode_item" id="select2">
            <option value="">Pilih Menu</option>
            @foreach ($data as $item)
            <option value="{{$item->kode_item}}" {{$item->flag != $active ? 'disabled' : ''}}>{{$item->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Nama Item</label>
                {!! Form::text('nama', null, ['id' => 'nama', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
            <label for="">Harga Item</label>
                {!! Form::text('harga', null, ['id' => 'harga', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="namaRole">Jumlah</label>
                <input name="qty" type="number" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group float-right">
        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
    </div>
</form>

@section('js-third')

    <script>
        $('select').on('change', function() {
            getDataItem(this.value)
        });
        function getDataItem(params) {
            $.ajax({
                type: "GET",
                url: "/api/item/"+params+"/show",
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    $('#nama').val(response.data.nama)
                    $('#harga').val(response.data.harga)
                }
            });
        }
    </script>
@endsection
