<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web" middleware group. Enjoy building your Admin!
|
*/
Route::group(['middleware'=>'auth:admin'], function(){

    Route::get('', [
        'as' => 'admin.dashboard.index',
        'uses' => 'DashboardController@index'
    ]);;

    Route::resource('videos', 'VideoController',[
        'as' => 'admin',
        'parameters' => ['videos' => 'id']
    ]);

    Route::resource('videoCats', 'VideoCategoryController', [
        'as' => 'admin',
        'parameters' => ['videoCats' => 'id']
    ]);

    Route::post('videoCats/sortcat', [
        'as' => 'admin.videoCats.sortcat',
        'uses' => 'VideoCategoryController@sortcat'
    ]);

    Route::resource('gallery','GalleryController',[
        'as' => 'admin',
        'parameters' => ['gallery' => 'id']
    ]);

    Route::resource('galleryCats', 'GalleryCategoryController',[
        'as' => 'admin',
        'parameters' => ['galleryCats' => 'id']
    ]);


    Route::resource('articles', 'ArticleController', [
        'as' => 'admin',
        'parameters' => ['articles' => 'id']
    ]);

    Route::post('articles/sort', [
        'as' => 'admin.articles.sort',
        'uses' => 'ArticleController@sort'
    ]);

    Route::resource('articleCats', 'ArticleCategoryController', [
        'as' => 'admin',
        'parameters' => ['articleCats' => 'id']
    ]);

    Route::post('articleCats/sortcat', [
        'as' => 'admin.articleCats.sortcat',
        'uses' => 'ArticleCategoryController@sortcat'
    ]);

    Route::group([
        'prefix' => 'gallery/{id}'
    ], function() {
        Route::get('images', [
            'as' => 'admin.images.create',
            'uses' => 'GalleryController@imageCreate'
        ]);

        Route::post('images', [
            'as' => 'admin.images.store',
            'uses' => 'GalleryController@imageStore'
        ]);
         Route::get('images/{image_id}', [
            'as' => 'admin.images.edit',
            'uses' => 'GalleryController@imageEdit'
         ]);

    });
});


Route::get('login', [
    'as' => 'admin.login.showLoginForm',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => 'admin.login.login',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'admin.login.logout',
    'uses' => 'Auth\LoginController@logout'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::post('password/reset', [
    'uses' => 'Auth\ResetPasswordController@reset'
]);

Route::get('password/reset/{token}',[
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);


