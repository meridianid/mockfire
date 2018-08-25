@extends('admin_template')

@section('content')
    <div class='row'>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Users Control</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach($data_user as $user)
                          <tr>
                              <td><a>#{{ $no++ }}</a></td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->role }}</td>
                              <td><form class="form-horizontal" method="POST" action="{{action('AdminController@delete_user')}}">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="ud" value="{{ $user->id }}">
                                  <button class="btn btn-danger" type="submit"
                                    @if($user->role == 'Administrator')
                                      disabled="disabled"
                                    @endif
                                  ><i class="fa fa-trash"></i></button>
                                </form></td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>

    </div><!-- /.row -->
@endsection