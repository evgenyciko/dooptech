<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {
    return view('welcome');

});

Route::get('test', function () {
    return view('testing');
});


Route::get('landing', function () {
  return view('landingpage');

});


Route::group(['middleware' => ['role:admin']], function () {
  Route::get('dashboard','DashboardController@index')->name('dashboard');

  Route::get('postingan','PostController@index')->name('postingan');
  Route::get('create_post','PostController@create')->name('create_post');
  Route::post('store_post','PostController@store')->name('store_post');
  Route::get('edit_post/{id}','PostController@edit')->name('edit_post');
  Route::post('update_post/{id}','PostController@update')->name('update_post');
  Route::post('delete_post','PostController@destroy')->name('delete_post');
  Route::get('hapus_sementara','PostController@hapus_sementara')->name('hapus_sementara');
  Route::post('restore','PostController@restore')->name('restore');
  Route::post('kill','PostController@kill')->name('kill');
  Route::post('ckeditor/upload','PostController@upload')->name('ckeditor/upload');
  

  Route::get('category','CategoryController@index')->name('category');
  Route::post('create_category','CategoryController@store')->name('create_category');
  Route::post('update_category','CategoryController@update')->name('update_category');
  Route::post('delete_category','CategoryController@destroy')->name('delete_category');

  Route::get('tags','TagsController@index')->name('tags');
  Route::post('create_tags','TagsController@store')->name('create_tags');
  Route::post('update_tags','TagsController@update')->name('update_tags');
  Route::post('delete_tags','TagsController@destroy')->name('delete_tags');

  Route::get('maps','CategoryController@show')->name('maps');
  Route::post('lokasi','CategoryController@get_lokasi')->name('lokasi');

  Route::get('users','UserController@index')->name('users');


});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/conversation/{user_id}', 'MessageController@conversation')->name('conversation');
Route::post('send-message','MessageController@sendMessage')->name('send-message');
Route::post('send-group-message','MessageController@sendGroupMessage')->name('send-group-message');
Route::post('group-members','MessageGroupController@store')->name('group-members');
Route::get('message-groups.show/{group_id}','MessageGroupController@show')->name('message-groups.show');

Route::get('delete-group/{id}','MessageGroupController@destroy')->name('delete-group');




