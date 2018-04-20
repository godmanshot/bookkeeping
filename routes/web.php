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

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/contacts', 'ContactsController@index')->name('contacts');

Route::get('/shares', 'SharesController@index')->name('shares');

Route::get('/offer', 'OfferController@index')->name('offer');

Route::get('/services', 'ServicesController@index')->name('services');
Route::get('/services/{service}', 'ServicesController@show')->name('services.show');

Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');

//->middleware('auth')
Route::namespace('Admin')->prefix('admin')->group(function () {
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

	Route::resource('pages', 'PagesController', ['names' => [
	    'index' => 'admin.pages',
	    'create' => 'admin.pages.create',
	    'store' => 'admin.pages.store',
	    'show' => 'admin.pages.show',
	    'edit' => 'admin.pages.edit',
	    'update' => 'admin.pages.update',
	    'destroy' => 'admin.pages.destroy',
	]]);
	
	Route::resource('posts', 'PostsController', ['names' => [
	    'index' => 'admin.posts',
	    'create' => 'admin.posts.create',
	    'store' => 'admin.posts.store',
	    'show' => 'admin.posts.show',
	    'edit' => 'admin.posts.edit',
	    'update' => 'admin.posts.update',
	    'destroy' => 'admin.posts.destroy',
	]]);

});

