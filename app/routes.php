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
Route::get('/signin', array('uses' => 'UsersController@index'));
Route::post('/signin', array('uses' => 'UsersController@login'));
Route::get('/signup', array('uses' => 'UsersController@create'));
Route::resource('show', 'UsersController');
Route::get('/', array('uses' => 'HomeController@test'));

Route::get('/{stock?}', array('uses' => 'HomeController@index'));