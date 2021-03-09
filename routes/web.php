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
Route::get('/admin', 'Auth\AuthController@login')->name('login');
Route::post('/login/store', 'Auth\AuthController@authenticate')->name('login.store');
Route::post('/logout', 'Auth\AuthController@logout')->name('logout');


Route::post('image/upload', 'ImageController@dropzone')->name('image.upload');

/* ======================================================
  Authorized user admin
============================ */
Route::name('admin.')->group(function () {
	Route::group(['middleware'=>['auth','transaction'],'prefix' =>'admin', 'namespace' => 'Admin'], function(){
		
		Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
		
		Route::resource('/divisions', 'DivisionController')->except(['show']);
		Route::resource('/districts', 'DistrictController')->except(['show']);
		Route::resource('/thanas', 'ThanaUpzilaController')->except(['show']);

	});
});

/* ======================================================
  Unauthorized user
============================ */
Route::group(['namespace' => 'Web'], function(){
	
	Route::get('/', 'DefaultController@index')->name('home');

	Route::get('/get-place', 'DefaultController@getPlace')->name('get.place');
	Route::post('/store', 'DefaultController@store')->name('store');


	Route::get('/removecache', function () {
	    \Artisan::call('cache:clear');
	    return 'ok';
	});

});

