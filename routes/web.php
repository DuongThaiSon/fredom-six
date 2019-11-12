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
    'namespace' => 'Client'
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
    Route::get('products/{slug_cat?}', [
        'as' => 'client.products.category',
        'uses' => 'ProductController@productCat'
    ]);
    Route::get('products/detail/{id}',[
        'as' => 'client.products.detail',
        'uses' => 'ProductController@detail'
    ]);
    Route::post('products/review',[
        'as' => 'client.review.review',
        'uses' => 'ProductController@review'
    ]);
    
    Route::get('cart', 'CartController@index');
    Route::post('cart/add', 'CartController@add');
    Route::post('cart/update', 'CartController@update');
    Route::post('cart/destroy', 'CartController@destroy');
    Route::get('cart/checkout', 'CartController@checkout');
    Route::post('cart/store', 'CartController@store');
  
    
    Route::get('home', 'HomeController@index');
    Route::group([
        'namespace' => 'Auth'
    ], function() {
        Route::get('login',[
            'as' => 'client.loginform',
            'uses' => 'LoginController@showLoginForm'
        ]);
        Route::post('login',[
            'as' => 'client.login',
            'uses' => 'LoginController@login'
        ]);
        Route::post('logout',[
            'as' => 'client.logout',
            'uses' => 'LoginController@logout'
        ]);
    });
});
