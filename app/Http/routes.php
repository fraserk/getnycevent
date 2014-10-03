<?php

 use App\Category;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.

|
*/

Route::get('/', 'EvntController@index');
Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@index']);

Route::get('/category/add/{category}',function($category){

	Category::create(['categoryName'=>$category, 'slug'=> \Str::slug($category)]);
		return 'Created....';
	});

Route::get('/event/category/{slug}',['as'=>'show.category','uses'=>'EvntController@category']);

Route::get('/expire','EvntController@expire');
Route::get('/event/create',['as'=>'create.event','uses'=>'EvntController@create']);
Route::post('/event/create',['as'=>'store.event','uses'=>'EvntController@store']);

Route::get('event/{slug}',['as'=>'show.event','uses'=>'EvntController@show']);
Route::get('event/{slug}/edit',['as'=>'edit.event','uses'=>'EvntController@edit']);
Route::put('event/{slug}/edit',['as'=>'update.event','uses'=>'EvntController@update']);
Route::delete('event/{slug}/delete',['as'=> 'delete.event','uses'=>'EvntController@destroy']);
Route::get('event/{slug}/restore',['as'=>'restore.event','uses'=>'EvntController@restore']);

Route::post('event/addvenue','VenueController@store');
Route::controller('auth','Auth\AuthController');
Route::controller('password','Auth\RemindersController');
//statice routes
Route::get('/contact',['as'=>'contact','uses'=>'StaticController@contact']);
Route::post('/contact',array('as'=>'sendcontact','uses'=>'StaticController@sendcontact'));
