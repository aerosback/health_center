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

Route::get('/', array('as' => 'user.index', 'uses' => 'UserController@index'));
Route::get('/register', array('as' => 'user.register', 'uses' => 'UserController@register'));
Route::post('/store', array('as' => 'user.store', 'uses' => 'UserController@store'));
Route::get('/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::post('/authenticate', array('as' => 'user.authenticate', 'uses' => 'UserController@authenticate'));
Route::get('/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));
Route::get('/account', array('as' => 'user.account', 'uses' => 'UserController@account'))->middleware('auth');
Route::get('/medics', array('as' => 'user.medics', 'uses' => 'UserController@medics'))->middleware('auth');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
