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
              @foreach ($roles as $key => $role)
              <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $role->name }}</td>
                  <td>
                      <a class="btn btn-info" href="{{ route('admin.roles.show',$role->id) }}">Show</a>
                      @can('role-edit')
                          <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
                      @endcan
                      @if (Auth::user()->roles[0]->id != $role->id)
                          @can('role-delete')
                              {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                              {!! Form::close() !!}
                          @endcan
                      @endif
                  </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
      </div>
    </div>
  </div>