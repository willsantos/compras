<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', 'ShopListsController@index')->name('lists');
Route::get('/shop/criar', 'ShopListsController@create')->name('form_shop_create');
Route::get('/shop/{id}', 'ShopListsController@show')->name('show_list');
Route::post('/shop', 'ShopListsController@store');
Route::delete('/shop/{id}', 'ShopListsController@destroy')->name('remove_list');
