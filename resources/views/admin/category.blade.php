@extends('admin_template')

@section('content')
    <div class='row'>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Category Control</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                	<p><a href="{{ url('/') }}/admin/category/tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a></p>
                	@if (Session::has('success'))
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ Session::get('success')}}
                      </div>
					         @elseif(Session::has('failed'))                 
						          <div class="alert alert-danger alert-dismissible">
	                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                        <h4><i class="icon fa fa-close"></i> Failed!</h4>
	                        {{ Session::get('failed')}}
                      </div>     
                    @endif
                  <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Name Category</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach($data_category as $d)
                          <tr>
                              <td><a href="{{ url('/') }}/admin/data_category/edit/{{ $d->id }}">{{ $no++ }}</a></td>
                              <td>{{ $d->option_grup }}</td>
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