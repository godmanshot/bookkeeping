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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//
Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function () {
	Route::get('/', 'HomeController@index')->name('admin.home');
	
	Route::get('/settings', 'SettingsController@index')->name('admin.settings');
	Route::post('/settings', 'SettingsController@store')->name('admin.settings.store');

	Route::get('/blocks', 'SiteBlocksController@index')->name('admin.info_blocks');
	Route::post('/blocks', 'SiteBlocksController@store')->name('admin.info_blocks.store');



	Route::resource('services', 'ServicesController', ['names' => [
	    'index' => 'admin.services',
	    'create' => 'admin.services.create',
	    'store' => 'admin.services.store',
	    'show' => 'admin.services.show',
	    'edit' => 'admin.services.edit',
	    'update' => 'admin.services.update',
	    'destroy' => 'admin.services.destroy',
	]]);

});

