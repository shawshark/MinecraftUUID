<?php

Route::get('/', function () {
	return View::make('home');
});

Route::get('uuid/{username}', 'UUIDController@uuid');
Route::get('session/{uuid}', 'UUIDController@session');