<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Resource;

class AdminController extends Controller
{
    public function user_show()
    {
        $data_user = User::orderBy('id','ASC')->get();
        return view('admin.users', compact('data_user'));
    }

    public function delete_user(Request $request)
    {
        // return $request->all();
        $user = User::where('id',$request->ud)->delete();
        return redirect('admin/users')->with('success','The user deleted with all his/her project !');

    }

    public function project_show()
    {
    	$data_project = Project::with('user')->select('user_id','id','name_project','created_at','endpoint')->orderBy('id','ASC')->get();
    	return view('admin.projects', compact('data_project'));
    }

    public function delete_project(Request $request)
    {
    	// return $request->all();
    	$project = Project::where('id',$request->idp)->delete();
    	return redirect('admin/projects')->with('success','The project deleted with resource and skema !');

    }

    public function resource_show(Request $request, $id_project)
    {
    	$data_resource = Resource::where('project_id',$id_project)->get();
    	return view('admin.resources', compact('data_resource'));
    }
}
