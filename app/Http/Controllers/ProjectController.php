<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Resouce;
use App\Schema;

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
    	return view('user.projects')->with('data_user',$user)->with('data_project',$project);
    }

    public function new_resource(Request $request, $id, $id_project) {
    	$user = User::where('id',$id)->first();
    	$project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	return view('user.new_resource')->with('data_project',$project);
    }

    public function add_resource(Request $request) {
    	// return $request->all();

    	// $data =  
    	// $data = $request->all();
    	// foreach ($data as $key => $value) {
    	// 	echo $key." ";
    	// }
    	// return;

    	// $data = $request;
    	// return $request->all();
    	// return var_dump($request->all());
    	// $coba = $request->all();
    	$decode = $request->all();
    	// return $decode;
    	var_dump($decode['field']);
    	$field = [];
    	foreach ($decode['field'] as $value) {
    		// echo $value['key']." ";
    		$field[$value['key']]= $value['value'];
    	}
    	var_dump($field);
  //   	if (is_array($decode) || is_object($decode))
		// {
		//     foreach ($decode as $data)
		//     {
		//         echo $data->field;
		//     }
		// }
    }
}
