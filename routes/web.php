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

Route::get('articles/{id}', 'PostsController@show');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::post('articles/nouveau', 'PostsController@store');
});
