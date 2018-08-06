@extends('admin_template')

@section('content')
    <div class='row'>        
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                   <h3 class="box-title">Data Resource Project</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
            @foreach ($data_resource as $data)
                <div class='col-md-3'>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Resource <strong><a>{{ $data->name_resource }}</a></strong></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                                <p><form class="form-horizontal" method="POST" action="{{action('ProjectController@delete_resource')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="resource_id" value="{{ $data->id }}">
                                    <input type="hidden" name="ud" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Resource</strong></button>
                                </form></p>
                        </div>
                    </div>
                </div>
            @endforeach

    </div><!-- /.row -->
@endsection