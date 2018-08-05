@extends('admin_template')

@section('content')
<a href="/project/{{ Auth::user()->id }}" class="btn bg-olive margin">Project</a> <button type="button" class="btn bg-olive margin"><i class="fa fa-arrow-right"></i></button>  <a class="btn bg-olive margin"><strong>{{ $data_project->name_project }}</strong></a>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">API Endpoint for <strong>{{ $data_project->name_project }}</strong></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <strong>http://localhost:8000/{{ $data_project->endpoint }}/</strong>:endpoint <br />
                        <a href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}/new_resource" class="btn btn-primary">New Resource</a>
                        <br /><br />

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        @foreach ($data_resource as $data)
            <div class='col-md-3'>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Resource <strong><a href="{{ url($data_project->endpoint, $data->id) }}">{{ $data->name_resource }}</a></strong></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                            <p><a class="btn btn-primary" href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}/resource/{{ $data->id }}">Edit Resource</a></p>
                            <p><form class="form-horizontal" method="POST" action="{{action('ProjectController@generate_data')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="resource_id" value="{{ $data->id }}">
                                <input type="hidden" name="endpoint" value="{{ $data_project->endpoint }}">
                                <button type="submit" class="btn btn-primary">Generate Data</strong></button>
                            </form></p>

                    </div>
                </div>
            </div>
        @endforeach

    </div><!-- /.row -->
@endsection