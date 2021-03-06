<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
use Response;
use Config;
use App\Jsonserver\JsonServer;
use App\Project;
use App\User;
use App\Resource;
use App\Skema;
use App\Skemaopsi;
use App\Skemaopsigroup;
use Faker\Factory as Faker;
// use Faker\Provider\id_ID\Person as Fakk;
use Auth;
use File;
use Storage;
use Exception;

class ProjectController extends Controller
{
	// Load data dari Tabel Skemaopsi

	public function loadData(Request $request)
	{
		$data = Skemaopsi::get();

		return response()->json($data);
	}

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
        $simpan = public_path().'/users/project/'.$name_project;
        File::makeDirectory($simpan, $mode = 0777, true, true);


        $user_project = Project::where('user_id',$user_id)->get();

        if($create_project) {
        	return redirect('project/'.Auth::user()->id.'')->with('success','Success create project')->with('data_project',$user_project);
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
    	$data_project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	if($data_project){
    		$data_resource = Resource::where('id',$id_resources)->first();
    		$data_skema = Skema::where('resource_id',$id_resources)->get();
    		$data_opsi = Skemaopsi::get();
            $data_opsigroup = Skemaopsigroup::get();
    		$data_cek = Skema::where('resource_id',$id_resources)->where('type_schema','array')->get();
    		// return $cek;
    		// return $skema;
    		return view('user.edit_resource', compact('data_skema','data_project','data_resource','data_opsi','data_opsigroup','data_cek'));
    	}
    	
    }

    public function new_resource(Request $request, $id, $id_project) {
    	$user = User::where('id',$id)->first();
    	// $project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	// $opsiskema = Skemaopsi::get();
    	// $opsigroupnya = Skemaopsigroup::get();
    	// return view('user.new_resource')->with('data_project',$project)->with('data_opsi', $opsiskema)->with('data_group_opsi', $opsigroupnya);
    	$data_project = Project::where('user_id',$id)->where('id',$id_project)->first();
    	$data_opsigroup = Skemaopsigroup::get();
        // return $data_opsigroup;
    	$data_opsi = Skemaopsi::get();
    	
    	return view('user.new_resource', compact('data_project','data_opsi','data_opsigroup'));
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
                'id' => $coy,
	            'project_id' => $request->project_id,
	            'name_resource' => $request->resource_name,
	            'type' => $request->method,
	        ]);

    	foreach ($decode['field'] as $key => $form) {
    		// echo $value['key']." ";
    		// echo $key;
    		$form['key'];
    		$form['value'];

    		if(is_array($form['value'])) {
    			$val= 'array';
    		}else{
    			$val= $form['value'];
    		}

    		// echo $key." ";
	        $create_schema = Skema::create([
	            'resource_id' => $create_resource->id,
	            'name_schema' => $form['key'],
	            'type_schema' => $val,
	            'parent_id' => '',
	            'field' => $key,
	        ]);

    		if(is_array($form['value'])) {
    			foreach ($form['value']['array']['data'] as $ki => $value) {
    				Skema::create([
			            'resource_id' => $create_resource->id,
			            'name_schema' => $value,
			            'type_schema' => $form['value']['array']['type'][$ki],
			            'parent_id' => $create_schema->id,
			            'field' => $key,
			        ]);
    			}

    		}

    	}
        $ud = Auth::user()->id;
        return redirect("/project/$ud/p/$request->project_id")->with('success','new resource created !');
    }

    public function edit_resource_update(Request $request)
    {
    	// return $request->all();
    	$decode = $request->all();

    	// $field = [];
    	$coy = time();
    	$delete = Skema::where('resource_id', $request->resource_id)->delete();
    	if($delete) {
	    	foreach ($decode['field'] as $key => $form) {
	    		// echo $value['key']." ";
	    		// echo $key;
	    		$form['key'];
	    		$form['value'];

	    		if(is_array($form['value'])) {
	    			$val= 'array';
	    		}else{
	    			$val= $form['value'];
	    		}

	    		// echo $key." ";
	    		
	    		
			        $create_schema = Skema::create([
			            'resource_id' => $request->resource_id,
			            'name_schema' => $form['key'],
			            'type_schema' => $val,
			            'parent_id' => '',
			            'field' => $key,
			        ]);

		    		if(is_array($form['value'])) {
		    			foreach ($form['value']['array']['data'] as $ki => $value) {
		    				Skema::create([
					            'resource_id' => $request->resource_id,
					            'name_schema' => $value,
					            'type_schema' => $form['value']['array']['type'][$ki],
					            'parent_id' => $create_schema->id,
					            'field' => $key,
					        ]);
		    			}

		    		}
	    	}
	    }
        $ud = Auth::user()->id;
        return redirect("/project/$ud/p/$request->project_id")->with('success','the resource updated !');
    }

    public function generate_data(Request $request)
    {
    	// return $request->all();
        // require_once '/path/to/Faker/src/autoload.php';
        $ud = Auth::user()->id;
    	$data = Skema::where('resource_id',$request->resource_id)->where('parent_id','')->with('child')->select('id','name_schema','type_schema','parent_id','field')->get();
        $search_ = Resource::where('id', $request->resource_id)->first();
        if(!$search_){
            return redirect("/project/$ud/p/$request->pid")->with('failed','Resource not found');
        }
        $searchProject = Project::where('id', $search_->project_id)->first();

    	
        // $faker = Faker\Generator();
        // $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker = Faker::create();
    	$no = 1;

        // return $faker->nik();
        $resouc = [];
        for ($i=1; $i < 11; $i++) { 
            # code...
        	$ha = array();
        	foreach ($data as $key) {
        		$d = $key->type_schema;
        		// $ha[] = ;
    		
    	    		if($key->type_schema == 'array'){
    	    			// echo "<p>".$key->name_schema;
    	    			$oy = array();
    		    		foreach($key->child as $hi){
    		    			$f = $hi->type_schema;	
    		    			// echo "<li>".$hi->name_schema." : ".$faker->$f."</li></p>";
    		    			$oy[$hi->name_schema] = $faker->$f;
    		    		}    
    		    		$ha[$key->name_schema] = $oy;
    	    		}else if($key->type_schema == 'ObjectID'){
    	    			$ha[$key->name_schema] = $i;
    	    		}else{
    	    			$ha[$key->name_schema] = $faker->$d;
    	    		}
        	}
            array_push($resouc, $ha);
        }
    	$di_encode = json_encode([$search_->name_resource => $resouc]);
        // return response()->json(['result'=>true,'data'=>'success make order'],200);
        // return $di_encode;
    	$file = '.json';
	    // $destinationPath=public_path('/users/project/'.$request->endpoint.'')."/$request->nrs";
        $destinationPath=public_path('/users/project')."/$searchProject->name_project/";
        if (!is_dir($destinationPath)) {
         mkdir($destinationPath,0777,true);  
        }
        // Storage::disk('public_data')->put($destinationPath$file, $di_encode);
	    // $create  = File::put($destinationPath.$file,$di_encode);
        $create = file_put_contents($destinationPath.$search_->name_resource.$file,$di_encode);
    	// echo $di_encode;
        if($create){
            return redirect("/project/$ud/p/$request->pid")->with('success','the resource has generated, for check please click the name of your resource !');
        }else{
            return redirect("/project/$ud/p/$request->pid")->with('failed','Failed to generate data');
        }
    }

    # DO NOT USE , THIS FUNCTION NOT FIX
    public function show_json(Request $request, $uri) //$endpoint, $name_resource //$uri
    {
        // return $uri;
        $params = explode('/', $uri);
        $endpoint = $params[0];
        $name_resource = $params[1];
        // $search = $params[2];
        // return $params[2];
        // return $request->search;
        // try {
            // $path = public_path() . "/users/project/$endpoint/$name_resource.json"; // ie: /var/www/laravel/public/users/project/folderendpoint/filename.json
            $path = storage_path('/datajson')."$name_resource.json";
            if (!File::exists($path)) {
                // throw new Exception("Invalid File");
                $data = array(
                    'status' => 404,
                    'message' => "File not found!"
                );
                return json_encode($data);
            }else {
                $file = File::get($path); // string
                if(isset($params[2])) {
                    // return "haylloo";
                    $hay = json_decode($file, true);
                    // return "haylloo";
                   foreach($hay as $row){
                        if($row['id'] == $params[2]){
                            // echo '<pre>';
                            // print_r($row);
                            return json_encode(array($row));
                        }
                    }
                } else {
                    return $file;
                }
            }
        // } catch(Exception $e) {
        //     $data = array(
        //             'status' => 404,
        //             'message' => "File not found!"
        //             // 'message' => $e->getMessage()
        //         );
        //     return json_encode($data);
        //     $this->set_response($data, REST_Controller::HTTP_INTERNAL_SERVER_ERROR );
        // }
    }

    public function delete_resource(Request $request)
    {
        // return $request->all();

        Skema::where('resource_id',$request->resource_id)->delete();
        Resource::where('id',$request->resource_id)->delete();

        return redirect("/project/$request->ud/p/$request->pid")->with('success','the resource deleted !');
    }

    public function handleRequest(Request $request, $project, $uri)
    {
        $data = $request->all();                          
        $db = explode('/', $uri);      
        $method = $request->method();  
        try {
            $pathToJson = public_path('users/project/'.$project.'/'.$db[0] .'.json'); //if your path in inside storage folder of laravel
            Config::set('jsonserver.pathToDb', $pathToJson); //here we set db
            // return Config::get('pathToDb');
            // return config('jsonserver.pathToDb');
            $jsonServer = new JsonServer();                                     
            $response = $jsonServer->handleRequest($method, $uri, $data);       
            $response->send();
        } catch(Exception $e) {
            $data = array(
                    'status' => 404,
                    'message' => "File not found!"
                    // 'message' => $e->getMessage()
                );
            return json_encode($data);
            $this->set_response($data, REST_Controller::HTTP_INTERNAL_SERVER_ERROR );
        }     
    }
}
