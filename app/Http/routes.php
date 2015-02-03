<?php

Route::get('/', 'HomeController@index');

Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@getLogout');

Route::get('/forgot', 'AuthController@getEmail');
Route::post('/forgot', 'AuthController@postEmail');
Route::get('/reset', 'AuthController@getReset');
Route::post('/reset', 'AuthController@postReset');
