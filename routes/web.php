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
    Route::group(['prefix' => 'news'], function () {
        Route::get('/',[
            'as' => 'client.news.index',
            'uses' => 'NewController@index'
        ]);
        Route::get('/{slug_view?}',[
            'as' => 'client.news.detail',
            'uses' => 'NewController@show'
        ]);
    });


    Route::get('showrooms',[
        'as' => 'client.showrooms.index',
        'uses' => 'ShowroomController@index'
    ]);
    Route::post('showrooms',[
        'as' => 'client.showrooms.contact',
        'uses' => 'ContactController@contact'
    ]);
    Route::post('subscribe', [
        'as' => 'client.subscribe',
        'uses' => 'ContactController@subscribe'
    ]);
    Route::get('new-arrival', [
        'as' => 'client.products.new',
        'uses' => 'ProductController@newArrival'
    ]);
    Route::get('products.htm', 'ProductController@productCat');
    Route::group(['prefix' => 'products'], function () {
        Route::get('{slug_cat}.htm', [
            'as' => 'client.products.category',
            'uses' => 'ProductController@productCat'
        ]);
        Route::get('{slug_cat}/{slug_view}.htm',[
            'as' => 'client.products.detail',
            'uses' => 'ProductController@detail'
        ]);
        Route::resource('{product}/reviews', 'ProductReviewController');
        Route::resource('{product}/comments', 'ProductCommentController');
    });


    Route::get('cart', 'CartController@index');
    Route::post('cart/add', 'CartController@add');
    Route::post('cart/update', 'CartController@update');
    Route::post('cart/destroy', 'CartController@destroy');
    Route::get('cart/checkout', 'CartController@checkout');
    Route::post('cart/store', 'CartController@store');
    Route::get('footer', 'HomeController@footer');


    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::group([
        'namespace' => 'Auth'
    ], function() {
        Route::get('register',[
            'as' => 'client.register',
            'uses' => 'RegisterController@showRegistrationForm'
        ]);
        Route::post('register/create',[
            'as' => 'client.register.create',
            'uses' => 'RegisterController@create'
        ]);
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
        Route::get('password/reset', [
            'as' => 'client.password.request',
            'uses' => 'ForgotPasswordController@showLinkRequest'
        ]);
        Route::post('password/email', [
            'as' => 'client.password.email',
            'uses' => 'ForgotPasswordController@sendResetLinkEmail'
        ]);
        Route::post('password/reset', [
            'as' => 'client.reset.password',
            'uses' => 'ResetPasswordController@reset'
        ]);

        Route::get('password/reset/{token}',[
            'as' => 'client.password.reset',
            'uses' => 'ResetPasswordController@showResetFormClient'
        ]);
    });

});
