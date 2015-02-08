<?php

Route::get('/', 'HomeController@index');

Route::controller('auth', 'Auth\AuthController');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('forgot', 'Auth\PasswordController@getEmail');
Route::post('forgot', 'Auth\PasswordController@postEmail');
Route::get('reset', 'Auth\PasswordController@getReset');
Route::post('reset', 'Auth\PasswordController@postReset');
