<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/{id}', 'LocationController@showLocation')->where('id', '[0-9]+');

Route::get('/item',
    ['as' => 'item', 'uses' => 'ItemController@index']);

Route::get('/item/create',
    ['as' => 'item_create', 'uses' => 'ItemController@create']);
Route::post('/item/create',
    ['as' => 'item_store', 'uses' => 'ItemController@store']);