<?php

use League\Csv\Reader;

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

Route::get('/', 'PagesController@home')->name('page.home');
Route::get('words', 'PagesController@words')->name('page.words');
Route::get('word/{slug}', 'PagesController@word')->name('page.word');


// Backend
Route::prefix('backend')->name('backend.')->group(function () {

	Route::get('/', function(){
		return redirect()->route('backend.dashboard');
	});
	
	Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');

	Route::get('word/json', 'Backend\WordController@json')->name('word.json');
	Route::resource('word', 'Backend\WordController');

	Route::get('post/json', 'Backend\PostController@json')->name('post.json');
	Route::resource('post', 'Backend\PostController');

	Route::get('category/json', 'Backend\CategoryController@json')->name('category.json');
	Route::resource('category', 'Backend\CategoryController');

});

Route::get('files', function(){
	// return public_path() . '/storage/featured_image';
	$files = File::allFiles(public_path() . '/storage/featured_image');
	dd($files);
});