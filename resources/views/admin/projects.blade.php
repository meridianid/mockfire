@extends('admin_template')

@section('content')
    <div class='row'>
        <div class="col-xs-12">
          @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ Session::get('success')}}
                </div>
            @endif
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Projects Controller</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>User</th>
                          <th>Name Project</th>
                          <th>Endpoint</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach($data_project as $data)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $data->user->name }}</td>
                              <td>{{ $data->name_project }}</td>
                              <td><a href="/admin/projects/{{ $data->id }}">#{{ $data->endpoint }}</a></td>
                              <td>{{ $data->created_at }}</td>
                              <td>
                                <form class="form-horizontal" method="POST" action="{{action('AdminController@delete_project')}}">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="idp" value="{{ $data->id }}">
                                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                              </td>
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