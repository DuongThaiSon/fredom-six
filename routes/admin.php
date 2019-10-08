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
    Route::group(['prefix' => 'setting'],
    function(){ 
        Route::get('/', [
        'as' => 'admin.setting.infoSetting',
        'uses' => 'SettingController@infoSetting'
        ]);
        Route::post('/postinfosetting', [
            'as' => 'admin.setting.postInfoSetting',
            'uses' => 'SettingController@postInfoSetting'
        ]);
        Route::get('/sendmail', [
            'as' => 'admin.setting.sendmail',
            'uses' => 'SettingController@sendmail'
        ]);
        Route::post('/postsendmail', [
            'as' => 'admin.setting.postSendmail',
            'uses' => 'SettingController@postSendmail'
        ]);
        Route::get('/seo', [
            'as' => 'admin.setting.seo',
            'uses' => 'SettingController@seo'
        ]);
        Route::post('/postseo', [
            'as' => 'admin.setting.postSeo',
            'uses' => 'SettingController@postSeo'
        ]);
        Route::get('/emailcontent', [
            'as' => 'admin.setting.emailcontent',
            'uses' => 'SettingController@emailContent'
        ]);
    });
   
    Route::group(['prefix' => 'component'], 
    function (){
        Route::get('/', [
            'as' => 'admin.component.index',
            'uses' => 'ComponentController@index'
        ]);
        Route::get('/add',[
            'as' => 'admin.component.addco',
            'uses' => 'ComponentController@addCo'
        ]);
        Route::post('/postaddco', [
            'as' => 'admin.component.postaddco',
            'uses' => 'ComponentController@postAddCo'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'admin.component.editco',
            'uses' => 'ComponentController@editCo'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'admin.component.posteditco',
            'uses' => 'ComponentController@postEditCo'
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


