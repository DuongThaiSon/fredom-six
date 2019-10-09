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



