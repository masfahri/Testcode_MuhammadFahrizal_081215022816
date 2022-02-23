<form action="{{ route('provinsi.store') }}" method="POST">
    @csrf


     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pegawai:</strong>
                <input value="" type="text" name="nama_pegawai" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Lahir:</strong>
                <input value="" type="text" name="tempat_lahir" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir:</strong>
                <input value="" type="date" name="tanggal_lahir" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin:</strong>
                <br>
                <label for="pria">Pria</label>
                <input type="checkbox" name="jenis_kelamin" id="" value="Pria">
                <label for="wanita">Wanita</label>
                <input type="checkbox" name="jenis_kelamin" id="" value="Wanita">
            </div>
        </div>
        {!! Form::select('agama', array('Islam', 'Kristen', 'Budha', 'Hindu', 'Khatolik'), null, ['class' => 'form-control']) !!}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>


</form>
