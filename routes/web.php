<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
	Route::get('/', function() {
		return view('admin.index');
	});
	Route::get('/entries', function() {
		return view('admin.entries');
	});
});