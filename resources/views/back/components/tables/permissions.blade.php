<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th width="280px">Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th width="280px">Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($permissions as $key => $role)
              <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $role->name }}</td>
                  <td>
                      <a class="btn btn-info" href="{{ route('admin.permissions.show',$role->id) }}">Show</a>
                      <a class="btn btn-primary" href="{{ route('admin.permissions.edit',$role->id) }}">Edit</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['admin.permissions.destroy', $role->id],'style'=>'display:inline']) !!}
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