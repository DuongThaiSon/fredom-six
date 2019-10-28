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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group([
    'namespace' => 'client'
], function () {
    Route::get('introduces',[
        'as' => 'client.introduces.index',
        'uses' => 'ArticleController@index'
    ]);

    Route::get('news',[
        'as' => 'client.news.index',
        'uses' => 'NewController@index'
    ]);
    Route::get('news/{id}',[
        'as' => 'client.news.detail',
        'uses' => 'NewController@show'
    ]);

    Route::get('showrooms',[
        'as' => 'client.showrooms.index',
        'uses' => 'ShowroomController@index'
    ]);
    Route::post('showrooms',[
        'as' => 'client.showrooms.contact',
        'uses' => 'ContactController@contact'
    ]);
    Route::get('products', 'ProductController@product');
    Route::get('products/{id}', 'ProductController@detail');
    Route::get('cart', 'CartController@index');
    Route::post('cart/add', 'CartController@add');
    Route::post('cart/update', 'CartController@update');
});
