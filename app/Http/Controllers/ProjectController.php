<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;

class ProjectController extends Controller
{
    public function add_project(Request $request) {
    	// return $request->all();

    	$name_project = $request->name_project;
    	$user_id = $request->user_id;

    	$create_project = Project::create([
            'user_id' => $user_id,
            'name_project' => $name_project,
            'endpoint' => str_random(15),
        ]);

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
}
