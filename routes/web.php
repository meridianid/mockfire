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

Route::get('/s', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@index');
Route::get('','UserController@page')->middleware('auth');



// Route::get('/{id}', 'UserController@project');

// Project
Route::post('/add_project', 'ProjectController@add_project')->middleware('auth');
Route::post('/add_resource', 'ProjectController@add_resource')->middleware('auth');
Route::get('project/{id}','ProjectController@get_project')->middleware('auth');
Route::get('project/{id}/p/{id_project}','ProjectController@detail_project')->middleware('auth');
Route::get('project/{id}/p/{id_project}/new_resource','ProjectController@new_resource')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
