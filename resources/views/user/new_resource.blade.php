@extends('admin_template')

@section('content')
<a href="/project/{{ Auth::user()->id }}" class="btn bg-olive margin">Project</a> <button type="button" class="btn bg-olive margin"><i class="fa fa-arrow-right"></i></button>  <a href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}" class="btn bg-olive margin"><strong>{{ $data_project->name_project }}</strong></a> <button type="button" class="btn bg-olive margin"><i class="fa fa-arrow-right"></i></button>  <a class="btn bg-olive margin"><strong>New Resource</strong></a>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New Resource</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form role="form" method="POST" action="{{action('ProjectController@add_resource')}}">
                      {{ csrf_field() }}
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="ResourceName">Resource Name</label>
                            <p>Enter meaningful resource name, it will be used to generate RESTful API URLs</p>
                            <p>EXAMPLE: users, comments, articles </p>
                            <input type="text" class="form-control" id="resourcename" name="resource_name" placeholder="Enter Resource Name">
                          </div>

                          <div class="form-group">
                            <label for="Endpoints">Endpoint</label>
                            <p> Enable/disable endpoints and customize response JSON</p>
                            <p>EXAMPLE: Custom response </p>
                            <code>
                                <pre>$mockData</pre>
                            </code>
                            or
                            <code>
                                <pre>{
  "anyKey": "anyValue",
  "items": "$mockData"
  "count": "$count"
}</pre>
                            </code>
                              <div class="col-xs-12">
                               <input type="radio" name="method" value="POST"> POST
                               <input type="radio" name="method" value="GET"> GET
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="schema">Schema (optional)</label>
                              <p> Define Resource schema, this will be used to generate mock data </p>
                              <!-- <div class="input_fields_wrap">
                                  <button class="add_field_button btn btn-primary"><i class="fa fa-plus"></i></button>
                                  
                              </div> -->
                          </div>

                      <div class="form-group">
                          <button class="add_field_button btn btn-primary" title="Add New Field"><i class="fa fa-plus"></i></button> <br><br>
                          <div class="row input_fields_wrap">
                              <div class="col-xs-4">
                                <input class="form-control" type="text" name="mytext[]" value="id">
                              </div>
                              <div class="col-xs-4">
                                <input class="form-control" type="text" name="mytext2[]" value="Object ID">
                              </div>
                              <br><br>
                          </div>
                      </div>

                          <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                  
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div><!-- /.box-body -->
                <div class="box-footer">
                   
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection