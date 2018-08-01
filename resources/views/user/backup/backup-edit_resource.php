@extends('edit_template')

@section('content')
<a href="/project/{{ Auth::user()->id }}" class="btn bg-olive margin">Project</a> <button type="button" class="btn bg-olive margin"><i class="fa fa-arrow-right"></i></button>  <a href="/project/{{ Auth::user()->id }}/p/{{ $data_project->id }}" class="btn bg-olive margin"><strong>{{ $data_project->name_project }}</strong></a> <button type="button" class="btn bg-olive margin"><i class="fa fa-arrow-right"></i></button>  <a class="btn bg-olive margin"><strong>{{ $data_resource->name_resource }}</strong></a>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Resource - {{ $data_resource->name_resource }}</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form role="form" method="POST" action="{{action('ProjectController@edit_resource_update')}}">
                      {{ csrf_field() }}
                      <input type="hidden" name="project_id" value="{{ $data_resource->id }}">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="Endpoints">Method</label>
                               <select name="method" class="form-control">
                                  <option value="{{ $data_resource->type }}">{{ $data_resource->type }} (current)</option>
                                  <option value="POST">POST</option>
                                  <option value="GET">GET</option>
                                  <option value="DELETE">DELETE</option>
                                  <option value="PUT">PUT</option>
                               </select>
                          </div>

                          <div class="form-group">
                              <label for="schema">Schema (optional)</label>
                              <p> Define Resource schema, this will be used to generate mock data </p>
                              <!-- <div class="input_fields_wrap">
                                  <button class="add_field_button btn btn-primary"><i class="fa fa-plus"></i></button>
                                  
                              </div> -->
                          </div>


                      <!-- <div class="form-group">
                          <button class="add_field_button btn btn-primary" title="Add New Field"><i class="fa fa-plus"></i></button> <br><br>
                          <div class="row daftar-isi">
                            <div class="skema">
                              <div class="col-xs-4">
                                <input class="form-control namefield" type="text" onkeyup="nospaces(this)" name="field[field1][key]" value="id">
                              </div>
                              <div class="col-xs-4">
                                <input class="form-control valuefield" type="text" name="field[field1][value]"value="ObjectID" readonly="">
                              </div>
                            </div>
                              <br><br>
                          </div>
                      </div> -->
                      <div class="form-group">
                      	<button class="add_field_button btn btn-primary" title="Add New Field"><i class="fa fa-plus"></i></button><br><br>
                      	<div class="row daftar-isi">
                      		@php $no = 1; @endphp
		                      @foreach($data_skema as $data)
		                      		@if($data->type_schema == 'array')
		                     			<!-- <br><br><p>ID Skema : {{ $data->id }} Name Skema : {{ $data->name_schema }} | Type : {{ $data->type_schema }} ---  -->
		                     			<div class="skema">
		                     				<div class="col-xs-4">
		                     					<input type="text" class="form-control namefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][key]" value="{{ $data->name_schema }}">
		                     				</div>
		                     				<div class="col-xs-4">
		                     					<select class="form-control select2 select_type" name="field[{{ $data->field }}][value]" style="width: 100%;" id="type">
		                     						@isset($data_opsi) @foreach($data_opsi as $databaru)
		                     						<option value="{{ $databaru->name_opsi }}"
		                     							@if ($databaru->value_opsi == old('field[{{ $data->field }}][value]', $databaru->value_opsi))
		                     							selected="selected"
		                     							@endif
		                     						>{{ $databaru->value_opsi }}</option>@endforeach @endisset</select>
		                     					
		                     				</div>
		                     					<p class="add_array"><a href="#" class="remove_field" title="Delete"><i class="fa fa-remove"></i></a><a class="skema_add_field btn btn-primary" title="Add New Array"><i class="fa fa-plus"></i></a></p>
		                     		@elseif($data->parent_id != '')
		                     			<!-- <ul><li>Name Skema : {{ $data->name_schema }} | Type : {{ $data->type_schema }} | Parent : {{ $data->parent_id }}</li></ul></p> -->
		                     				<div class="col-xs-4"></div>
				                     			<div class="col-md-4 skema2">
				                     				<div class="new_form form-group">
				                     					<input type="text" class="form-control namefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][value][array][data][]" value="{{ $data->name_schema }}">
				                     				</div>	
				                     	 		</div>
				                     			<div class="col-md-4 skema3">
				                     				<div class="new_form2 form-group">
				                     					<input type="text" class="form-control valuefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][value][array][type][]" value="{{ $data->type_schema }}">	
				                     				</div>
				                     			</div>
			                     		</div>
		                     		@else
		                     			<div class="skema">
			                     			<div class="col-xs-4">
			                     				<input type="text" class="form-control namefield" onkeyup="nospaces(this)" name="field[{{ $data->field }}][data]" value="{{ $data->name_schema }}">
			                     			</div>	
			                     			<div class="col-xs-4">
			                     				<input type="text" class="form-control valuefield" name="field[{{ $data->field }}][value]" onkeyup="nospaces(this)" value="{{ $data->type_schema }}">
			                     			</div>
			                     			<br><br>
			                     		</div>
		                     		@endif
		                  	  @endforeach
		                  	
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