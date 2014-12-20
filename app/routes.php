<?php

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
Route::get('/signin', array('uses' => 'UsersController@login'));
Route::post('/signin', array('uses' => 'UsersController@attempt'));
Route::get('/signup', array('uses' => 'UsersController@create'));
Route::post('/signup', array('uses' => 'UsersController@store'));
Route::get('/admin', array('uses' => 'AdminUserController@login'));
Route::get('/', array('uses' => 'HomeController@test'));

Route::get('/{stock?}', array('uses' => 'HomeController@index'));