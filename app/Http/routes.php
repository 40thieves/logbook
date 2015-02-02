<?php

Route::get('/', 'HomeController@index');

Route::get('/login', 'AccountsController@getLogin');
Route::post('/login', 'AccountsController@postLogin');
Route::get('/logout', 'AccountsController@getLogout');

//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
