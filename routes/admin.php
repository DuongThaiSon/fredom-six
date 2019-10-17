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
    
    Route::group(['prefix' => 'settings'],
    function(){ 
        Route::get('/', [
        'as' => 'admin.setting.infoSetting',
        'uses' => 'SettingController@infoSetting'
        ]);
        Route::post('/post-info-setting', [
            'as' => 'admin.setting.postInfoSetting',
            'uses' => 'SettingController@postInfoSetting'
        ]);
        Route::get('/send-mail', [
            'as' => 'admin.setting.sendMail',
            'uses' => 'SettingController@sendMail'
        ]);
        Route::post('/send-mail', [
            'as' => 'admin.setting.postSendMail',
            'uses' => 'SettingController@postSendMail'
        ]);
        Route::get('/seo', [
            'as' => 'admin.setting.seo',
            'uses' => 'SettingController@seo'
        ]);
        Route::post('/seo', [
            'as' => 'admin.setting.postSeo',
            'uses' => 'SettingController@postSeo'
        ]);
        Route::get('/email-content', [
            'as' => 'admin.setting.emailContent',
            'uses' => 'SettingController@emailContent'
        ]);
        Route::get('/email-content/add', [
            'as' => 'admin.setting.addEmailContent',
            'uses' => 'SettingController@addEmailContent'
        ]);
        Route::post('/email-content/add', [
            'as' => 'admin.setting.postAddEmailContent',
            'uses' => 'SettingController@postAddEmailContent'
        ]);
        Route::get('/email-content/edit/{id}', [
            'as' => 'admin.setting.editEmailContent',
            'uses' => 'SettingController@editEmailContent'
        ]);
        Route::post('/email-content/edit{id}', [
            'as' => 'admin.setting.postEditEmailContent',
            'uses' => 'SettingController@postEditEmailContent'
        ]);

    });
   
    Route::group(['prefix' => 'components'], 
    function (){
        Route::get('/', [
            'as' => 'admin.component.index',
            'uses' => 'ComponentController@index'
        ]);
        Route::get('/add',[
            'as' => 'admin.component.create',
            'uses' => 'ComponentController@create'
        ]);
        Route::post('/add', [
            'as' => 'admin.component.store',
            'uses' => 'ComponentController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'admin.component.show',
            'uses' => 'ComponentController@show'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'admin.component.update',
            'uses' => 'ComponentController@update'
        ]);
        Route::get('/public', [
            'as' => 'admin.component.changePublic',
            'uses' => 'ComponentController@changePublic'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'admin.component.delete',
            'uses' => 'ComponentController@delete'
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
    Route::group(['prefix' => 'user'], function(){
        Route::get('/info/{id}',[
            'as' => 'user.info',
            'uses' => 'UserController@info'
        ]);
        Route::post('/info/change',[
            'as' => 'info.change',
            'uses' => 'UserController@changeInfo'
        ]);
        Route::get('/add',[
            'as' => 'user.add',
            'uses' => 'UserController@getAddUser'
        ]);
        Route::post('/add',[
            'as' => 'user.postadd',
            'uses' => 'UserController@postAddUser'
        ]);
        Route::get('/admin',[
            'as' => 'user.admin',
            'uses' => 'UserController@admin'
        ]);
        Route::get('/delete/{id}',[
            'as' =>'user.delete',
            'uses' => 'UserController@delete'
        ]);
        Route::post('/deleteAll',[
            'as' => 'user.deleteAll',
            'uses' => 'UserController@deleteAll'
        ]);
    });



    Route::get('contact',[
        'as' => 'contact',
        'uses' => 'ContactController@index'
    ]);
    Route::get('contact/delete',[
        'as' => 'contact.delete',
        'uses' => 'ContactController@delete'
    ]);
    Route::delete('contact/delete',[
        'as' => 'contact.deleteAll',
        'uses' => 'ContactController@deleteAll'
    ]);



    Route::post('check-user', 'UserController@check');
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



