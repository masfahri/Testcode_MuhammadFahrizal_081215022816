<form method="POST" action="{{ route('pelayan.order.store') }}">
    @csrf
    {!! Form::hidden('segment', request()->segment(3), [null]) !!}

    <div class="form-group">
        <label for="namaRole">Nama Pelanggan</label>
        {!! Form::text('nama_pelanggan', old('nama_pelanggan'), ['class' => 'form-control']) !!}
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Jumlah Bayar</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    {!! Form::text('jumlah_bayar', null, ['id' => 'jumlah_bayar', 'class' => 'form-control', 'onkeyup'=>"sum();"]) !!}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Jumlah Kembalian</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    {!! Form::text('jumlah_kembalian', null, ['id' => 'jumlah_kembalian', 'class' => 'form-control', 'readonly']) !!}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="">Total Bayar</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    {!! Form::text('subtotal', $subtotal, ['id' => 'subtotal', 'class' => 'form-control', 'readonly']) !!}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="">Catatan</label>
                {!! Form::textarea('catatan', null, ['id' => 'subtotal', 'class' => 'form-control', 'cols' => 2, 'rows' => 4]) !!}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="">Nomor Meja</label>
                {!! Form::select('nomor_meja', $meja, null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="form-group float-right">
        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
    </div>
</form>

@section('js-third')

@endsection
