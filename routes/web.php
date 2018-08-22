<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.codes.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
