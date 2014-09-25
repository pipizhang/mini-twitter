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

Route::get('/', 'HomeController@home');
Route::post('/login', array('as'=>'login', 'uses'=>'HomeController@login'));
Route::get('/logout', array('as'=>'logout', 'uses'=>'HomeController@logout'));
Route::get('/language', 'HomeController@language');
Route::get('/user', 'HomeController@user');

Route::resource('posts', 'PostsController');
