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

use Illuminate\Support\Facades\File;

Route::group([
    'namespace' => 'Client'
], function () {
    Route::get('', [
        'as' => 'client.index',
        'uses' => 'HomeController@index'
    ]);
    Route::get('cart', [
        'as' => 'client.cart',
        'uses' => 'CartController@index'
    ]);

    Route::post('cart', [
        'as' => 'client.cart.store',
        'uses' => 'CartController@store'
    ]);

    Route::put('cart/{id}', [
        'as' => 'client.cart.update',
        'uses' => 'CartController@update'
    ]);

    Route::delete('cart/{id}', [
        'as' => 'client.cart.destroy',
        'uses' => 'CartController@destroy'
    ]);

    Route::post('cart/checkout', [
        'as' => 'client.cart.checkout',
        'uses' => 'CartController@checkout'
    ]);

    Route::get('search', [
        'as' => 'client.search',
        'uses' => 'SearchController@index'
    ]);

    Route::get('collections', [
        'as' => 'client.collection',
        'uses' => 'CollectionController@index'
    ]);
    // Route::get('product-list', [
    //     'as' => 'client.product',
    //     'uses' => 'ProductController@index'
    // ]);
    // Route::get('product-detail', [
    //     'as' => 'client.product-detail',
    //     'uses' => 'ProductDetailController@index'
    // ]);
    Route::get('{slug_cat}', [
        'as' => 'client.productCategory',
        'uses' => 'ProductController@index'
    ]);

    Route::get('{slug_cat}/{slug_view}', [
        'as' => 'client.productDetail',
        'uses' => 'ProductController@show'
    ]);

    // Route::group(['prefix' => 'product'], function() {
    //     Route::get('', [
    //         'as' => 'client.product',
    //         'uses' => 'ProductController@index'
    //     ]);
    //     Route::get('/{slug}', [
    //         'as' => 'client.product.detail',
    //         'uses' => 'ProductController@show'
    //     ]);
    // });

    // Route::group(['prefix' => 'service'], function() {
    //     Route::get('', [
    //         'as' => 'client.service',
    //         'uses' => 'ServiceController@index'
    //     ]);
    //     Route::get('/{slug}', [
    //         'as' => 'client.service.detail',
    //         'uses' => 'ServiceController@show'
    //     ]);
    // });
});

