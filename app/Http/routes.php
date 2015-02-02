<?php

Route::get('/', 'HomeController@index');

Route::controller('/accounts', 'AccountsController');
Route::get('/login', 'AccountsController@getLogin');
Route::post('/login', 'AccountsController@postLogin');
Route::get('/logout', 'AccountsController@getLogout');

//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
