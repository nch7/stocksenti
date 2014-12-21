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
Route::get('/', array('uses' => 'UsersController@index'));
Route::post('/login',array('uses' => 'UsersController@attempt'));
Route::post('/register',array('uses' => 'UsersController@store'));
Route::get('/logout',array('uses' => 'UsersController@destroy'));

Route::get('/signin', array('uses' => 'UsersController@login'));
Route::post('/signin', array('uses' => 'UsersController@attempt'));
Route::get('/signup', array('uses' => 'UsersController@create'));
Route::post('/signup', array('uses' => 'UsersController@store'));
Route::get('/admin', array('uses' => 'AdminUserController@login'));
