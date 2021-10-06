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

//Rotas da Lista de compras

Route::get('/shop', 'ShopListsController@index')->name('lists');
Route::get('/shop/create', 'ShopListsController@create')->name('form_shop_create');
Route::get('/shop/{id}', 'ShopListsController@show')->name('show_list');
Route::post('/shop', 'ShopListsController@store');
Route::get('/shop/edit/{id}', 'ShopListsController@edit')->name('form_shop_edit');
Route::patch('/shop/{id}', 'ShopListsController@update');
Route::delete('/shop/{id}', 'ShopListsController@destroy')->name('remove_list');


//Rota temporaria

Route::get('/test/item', 'ShopListsController@storeItems');


//Rotas dos items

Route::get('/item', 'ItemsController@index')->name('items');
Route::get('/item/create', 'ItemsController@create')->name('form_item_create');
Route::get('/item/{id}', 'ItemsController@show')->name('show_item');
Route::post('/item', 'ItemsController@store');
Route::get('/item/edit/{id}', 'ItemsController@edit')->name('form_item_edit');
Route::patch('/item/{id}', 'ItemsController@update');
Route::delete('/item/{id}', 'ItemsController@destroy')->name('remove_item');
