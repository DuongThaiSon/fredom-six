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
    ]);
    Route::get('password/change',[
        'as' => 'password.change',
        'uses' => 'ChangePasswordController@getChangePassword'
    ]);
    Route::post('password/change',[
        'as' => 'password.change',
        'uses' => 'ChangePasswordController@postChangePassword'
    ]);
    Route::get('user/info/{id}',[
        'as' => 'user.info',
        'uses' => 'UserController@info'
    ]);
    Route::post('info/change',[
        'as' => 'info.change',
        'uses' => 'UserController@changeInfo'
    ]);
    Route::get('user/add',[
        'as' => 'user.add',
        'uses' => 'UserController@getAddUser'
    ]);
    Route::post('user/add',[
        'as' => 'user.postadd',
        'uses' => 'UserController@postAddUser'
    ]);
    Route::get('user/admin',[
        'as' => 'user.admin',
        'uses' => 'UserController@admin'
    ]);
    Route::get('user/delete/{id}',[
        'as' =>'user.delete',
        'uses' => 'UserController@delete'
    ]);
    Route::post('user/deleteAll',[
        'as' => 'user.deleteAll',
        'uses' => 'UserController@deleteAll'
    ]);




    Route::get('contact',[
        'as' => 'contact',
        'uses' => 'ContactController@index'
    ]);
    Route::get('contact/delete/{id}',[
        'as' => 'contact.delete',
        'uses' => 'ContactController@delete'
    ]);
    Route::post('contact/delete',[
        'as' => 'contact.deleteAll',
        'uses' => 'ContactController@deleteAll'
    ]);



    Route::get('order',[
        'as' => 'order',
        'uses' => 'OrderController@index'
    ]);
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



