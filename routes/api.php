<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'api'], function () {
    Route::resource('codes', 'CodesController', ['except' => ['create', 'edit']]);
});

