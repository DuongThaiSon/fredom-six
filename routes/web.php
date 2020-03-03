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
        'as' => 'client.home',
        'uses' => 'HomeController@index'
    ]);
    Route::get('about', [
        'as' => 'client.about',
        'uses' => 'AboutController@index'
    ]);
    Route::get('customer', [
        'as' => 'client.customer',
        'uses' => 'CustomerController@index'
    ]);
    Route::post('/contact', [
        'as' => 'client.contact',
        'uses' => 'HomeController@contact'
    ]);
    
    Route::group(['prefix' => 'product'], function() {
        Route::get('', [
            'as' => 'client.product',
            'uses' => 'ProductController@index'
        ]);
        Route::get('/{slug}', [
            'as' => 'client.product.detail',
            'uses' => 'ProductController@show'
        ]);
    });

    Route::group(['prefix' => 'service'], function() {
        Route::get('', [
            'as' => 'client.service',
            'uses' => 'ServiceController@index'
        ]);
        Route::get('/{slug}', [
            'as' => 'client.service.detail',
            'uses' => 'ServiceController@show'
        ]);
    });
});

