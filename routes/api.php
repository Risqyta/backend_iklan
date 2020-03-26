<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
    

});
Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::get('iklan', 'IklanController@iklan');

    Route::get('iklanall', 'IklanController@iklanAuth')->middleware('jwt.verify');
    Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify'); 

    Route::get('/produk', 'ProdukController@index');
    Route::get('/produk/{id}', 'ProdukController@show');
    Route::post('/produk', 'ProdukController@store');
    Route::put('/produk/{id}', 'ProdukController@update');
    Route::delete('/produk/{id}', 'ProdukController@destroy');
