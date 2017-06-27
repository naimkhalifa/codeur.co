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

Route::get('/', ['as' => 'home', 'uses' =>  function () {
    return view('publications.welcome');
}]);

Route::get('configurer-git-pour-déployer-sur-un-mutualisé-ovh', function () {
    return view('publications.git-ovh');
});

Route::get('articles/{id}', 'PostsController@show')->name('posts.show');

Route::namespace('Admin')
	->middleware('admin')
	->prefix('admin')
	->group(function () {
	    Route::get('articles/nouveau', 'PostsController@create')->name('admin.posts.create');
	    Route::post('articles/nouveau', 'PostsController@store')->name('admin.posts.store');
		Route::get('articles/{id}', 'PostsController@show')->name('admin.posts.show');
		Route::get('articles/{id}/editer', 'PostsController@edit')->name('admin.posts.edit');
	    Route::post('articles/{id}/editer', 'PostsController@update')->name('admin.posts.update');

	    Route::delete('articles/{id}/supprimer', 'PostsController@destroy')->name('admin.posts.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');
