<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/shop', 'ShopListsControllerApi@index')->name('lists');
Route::post('/shop', 'ShopListsControllerApi@store');
Route::get('/shop/{id}', 'ShopListsControllerApi@show')->name('show_list');
Route::delete('/shop/{id}', 'ShopListsControllerApi@destroy')->name('remove_list');

Route::post('/shop/{id}/add', 'ShopListsControllerApi@storeItems')->name('add_list_item');
