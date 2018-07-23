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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                            New Resource
                        </button>
                        <br /><br />

                </div><!-- /.box-body -->
                <div class="box-footer">
                   
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

         <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Resource</h4>
              </div>
              <form role="form" method="POST" action="{{action('ProjectController@add_project')}}">
                {{ csrf_field() }}
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="ResourceName">Resource Name</label>
                      <br /> Enter meaningful resource name, it will be used to generate RESTful API URLs <br />
                      EXAMPLE: users, comments, articles 
                      <input type="text" class="form-control" id="resourcename" placeholder="Enter Resource Name">
                    </div>

                    <div class="form-group">
                      <label for="Endpoints">Endpoint</label>
                      <br /> Enable/disable endpoints and customize response JSON <br />
                      EXAMPLE: Custom response 
                      <input type="text" class="form-control" id="resourcename" placeholder="Enter Resource Name">
                    </div>


                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endsection