<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/v1/users', 'Api\UserController@index');
Route::get('/v1/orders/{}', 'Api\OrderController@index');

Route::get('/v1/user/{user}', 'Api\UserController@show');

Route::get('/v1/metadata', 'Api\MetadataController@index');
// Route::get('/v1/dishes', 'Api\DishController@index');

Route::get('/generate', 'Api\OrderController@generate');
Route::post('/make/payment', 'Api\OrderController@makePayment');

Route::post('/create/order', 'Api\OrderController@createOrder');



