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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show', 'HomeController@show')->name('showData');

Route::group(['prefix' => 'web'], function () {
	Route::resource('/fileUpload', 'System\UploadFiles');
	Route::group(['prefix' => '/cmms'], function() {
        Route::resource('/brands','CMMS\BrandController');
        Route::resource('/models', 'CMMS\ModelController');
	});
});