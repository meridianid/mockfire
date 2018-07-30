<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Resource;
use App\Skema;
use Faker\Factory as Faker;

use Storage;

class ProjectController extends Controller
{
    public function add_project(Request $request) {
    	// return $request->all();

    	$name_project = $request->name_project;
    	$user_id = $request->user_id;

    	$rand_str = str_random(15);

    	$create_project = Project::create([
            'user_id' => $user_id,
            'name_project' => $name_project,
            'endpoint' => $rand_str,
        ]);

        // $create_directory = Storage::MakeDirectory(public_path($rand_str));

        $user_project = Project::where('user_id',$user_id)->get();

        if($create_project) {
        	return redirect('project/'.$user_id.'')->with('success','Success create project')->with('data_project',$user_project);
        }
    }

    public function get_project(Request $request, $id) {
    	$user_project = Project::where('user_id',$id)->orderBy('id','DESC')->get();

    	if ($user_project) {
    		// return $user_project;
    		// return redirect()->with('data_project',$user_project);
    		return view('user.index')->with('data_project',$user_project);
    	}
    }

    public function detail_project(Request $request, $id, $id_project) {
    	$user = User::where('id',$id)->first();
    	$project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	if($project){
    		$resource = Resource::where('project_id',$id_project)->get();
    		return view('user.projects')->with('data_resource',$resource)->with('data_project',$project);
    	}
    	
    }

    public function edit_resource(Request $request, $id, $id_project, $id_resources) {
    	$user = User::where('id',$id)->first();
    	$project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	if($project){
    		$resource = Resource::where('id',$id_resources)->first();
    		$skema = Skema::where('resource_id',$id_resources)->get();
    		// return $skema;
    		return view('user.edit_resource')->with('data_skema',$skema)->with('data_project',$project)->with('data_resource',$resource);
    	}
    	
    }

    public function new_resource(Request $request, $id, $id_project) {
    	$user = User::where('id',$id)->first();
    	$project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	return view('user.new_resource')->with('data_project',$project);
    }

    public function add_resource(Request $request) {
    	// return $request->all();

    	$decode = $request->all();
    	// return $decode['field'];
    	// var_dump($decode['field']);
    	// return $decode['field'];
    	// return count($decode['field']);
    	$field = [];
    	$coy = time();

    	$create_resource = Resource::create([
	            'project_id' => $request->project_id,
	            'name_resource' => $request->resource_name,
	            'type' => $request->method,
	        ]);

    	foreach ($decode['field'] as $key => $form) {
    		// echo $value['key']." ";
    		$form['key'];
    		$form['value'];

    		if(is_array($form['value'])) {
    			$val= 'array';
    		}else{
    			$val= $form['value'];
    		}

	        $create_schema = Skema::create([
	            'resource_id' => $create_resource->id,
	            'name_schema' => $form['key'],
	            'type_schema' => $val,
	            'parent_id' => '',
	        ]);

    		if(is_array($form['value'])) {
    			foreach ($form['value']['array']['data'] as $key => $value) {
    				Skema::create([
			            'resource_id' => $create_resource->id,
			            'name_schema' => $value,
			            'type_schema' => $form['value']['array']['type'][$key],
			            'parent_id' => $create_schema->id,
			        ]);
    			}

    		}

    	}
    }

    public function generate_data(Request $request)
    {
    	// return $request->all();

    	$data = Skema::where('resource_id',$request->resource_id)->with('child')->get();
    	// return $data;
    	$faker = Faker::create();
    	foreach ($data as $key) {
    		foreach($key->child as $value) {
    			$d = $value->type_schema;
    			echo "<p>".$value->name_schema." : ".$faker->$d."</p>";

    		}
    	}
    }
}
