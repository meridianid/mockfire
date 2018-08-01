<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
date_default_timezone_set('Asia/Jakarta');

Route::get('/s', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@index');
Route::get('','UserController@page')->middleware('auth');



// Route::get('/{id}', 'UserController@project');

// Project
Route::post('/add_project', 'ProjectController@add_project')->middleware('auth');
Route::post('/add_resource', 'ProjectController@add_resource')->middleware('auth');
Route::post('/edit_resource_update', 'ProjectController@edit_resource_update')->middleware('auth');
Route::post('/generate_data','ProjectController@generate_data')->middleware('auth');
Route::get('project/{id}','ProjectController@get_project')->middleware('auth');
Route::get('project/{id}/p/{id_project}','ProjectController@detail_project')->middleware('auth');
Route::get('project/{id}/p/{id_project}/resource/{id_resource}','ProjectController@edit_resource')->middleware('auth');
Route::get('project/{id}/p/{id_project}/new_resource','ProjectController@new_resource')->middleware('auth');

Route::get('/load', 'ProjectController@loadData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/tes')
