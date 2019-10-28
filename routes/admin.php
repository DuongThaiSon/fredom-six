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

    // video
    Route::group(['prefix' => 'videos'], function() {
        Route::post('sort', [
            'as' => 'admin.videos.sort',
            'uses' => 'VideoController@sort'
        ]);
        Route::post('change-is-public', [
            'as' => 'admin.videos.change-is-public',
            'uses' => 'VideoController@changeIsPublic'
        ]);
        Route::post('change-is-highlight', [
            'as' => 'admin.videos.change-is-highlight',
            'uses' => 'VideoController@changeIsHighlight'
        ]);
        Route::post('change-is-new', [
            'as' => 'admin.videos.change-is-new',
            'uses' => 'VideoController@changeIsNew'
        ]);
        Route::delete('delete',[
            'as' => 'admin.videos.deleteAll',
            'uses' => 'VideoController@deleteAll'
        ]);
        Route::get('movetop/{video?}',[
            'as' => 'admin.videos.movetop',
            'uses' => 'VideoController@movetop',
        ]);
    });
    Route::resource('videos', 'VideoController',[
        'as' => 'admin',
        'parameters' => ['videos' => 'id']
    ]);

    // video category
    Route::group(['prefix' => 'video-cats'], function() {
        Route::get('{id}/delete', [
            'as' => 'admin.video-cats.delete',
            'uses' => 'VideoCategoryController@destroy'
        ]);
        Route::post('sortcat', [
            'as' => 'admin.video-cats.sortcat',
            'uses' => 'VideoCategoryController@sortcat'
        ]);
    });
    Route::resource('video-cats', 'VideoCategoryController');

    // gallery
    Route::group(['prefix' => 'galleries'], function() {
        Route::post('{gallery}/process', [
            'as' => 'admin.galleries.processImage',
            'uses' => 'GalleryController@processImage'
        ]);
        Route::get('{id}/delete', [
            'as' => 'admin.galleries.delete',
            'uses' => 'GalleryController@destroy'
        ]);

        Route::post('sort', [
            'as' => 'admin.galleries.sort',
            'uses' => 'GalleryController@sort'
        ]);

        Route::post('change-is-public', [
            'as' => 'admin.galleries.change-is-public',
            'uses' => 'GalleryController@changeIsPublic'
        ]);

        Route::post('change-is-highlight', [
            'as' => 'admin.galleries.change-is-highlight',
            'uses' => 'GalleryController@changeIsHighlight'
        ]);

        Route::post('change-is-new', [
            'as' => 'admin.galleries.change-is-new',
            'uses' => 'GalleryController@changeIsNew'
        ]);


        Route::get('movetop/{gallery?}',[
            'as' => 'admin.galleries.movetop',
            'uses' => 'GalleryController@movetop',
        ]);

        Route::delete('delete',[
            'as' => 'admin.galleries.deleteAll',
            'uses' => 'GalleryController@deleteAll'
        ]);
    });
    Route::resource('galleries','GalleryController',[
        'as' => 'admin',
        'parameters' => ['gallery' => 'id']
    ]);

    // gallery category
    Route::group(['prefix' => 'gallery-cats'], function () {
        Route::get('{id}/delete', [
            'as' => 'admin.gallery-cats.delete',
            'uses' => 'GalleryCategoryController@destroy'
        ]);
        Route::post('sortcat', [
            'as' => 'admin.gallery-cats.sortcat',
            'uses' => 'GalleryCategoryController@sortcat'
        ]);
    });
    Route::resource('gallery-cats', 'GalleryCategoryController',[
        'as' => 'admin',
        'parameters' => ['gallery-cats' => 'id']
    ]);

    // article
    Route::group(['prefix' => 'articles'], function() {
        Route::get('{id}/delete', [
            'as' => 'admin.articles.delete',
            'uses' => 'ArticleController@destroy'
        ]);
        Route::delete('delete',[
            'as' => 'admin.articles.deleteAll',
            'uses' => 'ArticleController@deleteAll'
        ]);
        Route::post('sort', [
            'as' => 'admin.articles.sort',
            'uses' => 'ArticleController@sort'
        ]);
        Route::post('update-view-status', 'ArticleController@updateViewStatus');
        Route::get('search', [
            'as' => 'admin.articles.search',
            'uses' => 'ArticleController@search'
        ]);
        Route::get('movetop/{article?}',[
            'as' => 'admin.articles.movetop',
            'uses' => 'ArticleController@movetop',
        ]);
        Route::get('category/{id}',[
            'as' => 'admin.article.cat',    // article theo category id
            'uses' => 'ArticleCategoryController@articles'
        ]);
    });
    Route::resource('articles', 'ArticleController', [
        'as' => 'admin',
        'parameters' => ['articles' => 'id']
    ]);

    Route::group(['prefix' => 'article-cats'], function() {
        Route::get('{id}/delete', [
            'as' => 'admin.article-cats.delete',
            'uses' => 'ArticleCategoryController@destroy'
        ]);
        Route::post('sortcat', [
            'as' => 'admin.article-cats.sortcat',
            'uses' => 'ArticleCategoryController@sortcat'
        ]);
    });
    Route::resource('article-cats', 'ArticleCategoryController');

    Route::group(['prefix' => 'settings'], function(){
        Route::get('', [
            'as' => 'admin.setting.infoSetting',
            'uses' => 'SettingController@infoSetting'
        ]);
        Route::post('post-info-setting', [
            'as' => 'admin.setting.postInfoSetting',
            'uses' => 'SettingController@postInfoSetting'
        ]);
        Route::get('send-mail', [
            'as' => 'admin.setting.sendMail',
            'uses' => 'SettingController@sendMail'
        ]);
        Route::post('send-mail', [
            'as' => 'admin.setting.postSendMail',
            'uses' => 'SettingController@postSendMail'
        ]);
        Route::get('seo', [
            'as' => 'admin.setting.seo',
            'uses' => 'SettingController@seo'
        ]);
        Route::post('seo', [
            'as' => 'admin.setting.postSeo',
            'uses' => 'SettingController@postSeo'
        ]);
        Route::get('email-content', [
            'as' => 'admin.setting.emailContent',
            'uses' => 'SettingController@emailContent'
        ]);
        Route::get('email-content/add', [
            'as' => 'admin.setting.addEmailContent',
            'uses' => 'SettingController@addEmailContent'
        ]);
        Route::post('email-content/add', [
            'as' => 'admin.setting.postAddEmailContent',
            'uses' => 'SettingController@postAddEmailContent'
        ]);
        Route::get('email-content/edit/{id}', [
            'as' => 'admin.setting.editEmailContent',
            'uses' => 'SettingController@editEmailContent'
        ]);
        Route::post('email-content/edit/{id}', [
            'as' => 'admin.setting.postEditEmailContent',
            'uses' => 'SettingController@postEditEmailContent'
        ]);

    });

    Route::group(['prefix' => 'components'], function (){
        Route::get('', [
            'as' => 'admin.components.index',
            'uses' => 'ComponentController@index'
        ]);
        Route::get('add',[
            'as' => 'admin.components.create',
            'uses' => 'ComponentController@create'
        ]);
        Route::post('add', [
            'as' => 'admin.components.store',
            'uses' => 'ComponentController@store'
        ]);
        Route::get('edit/{id}', [
            'as' => 'admin.components.show',
            'uses' => 'ComponentController@show'
        ]);
        Route::post('edit/{id}', [
            'as' => 'admin.components.update',
            'uses' => 'ComponentController@update'
        ]);
        Route::get('public', [
            'as' => 'admin.components.changePublic',
            'uses' => 'ComponentController@changePublic'
        ]);
        Route::get('delete/{id}', [
            'as' => 'admin.components.delete',
            'uses' => 'ComponentController@delete'
        ]);
    });

    Route::resource('showrooms', 'ShowroomController',[
        'as' => 'admin',
        'parameters' => ['showrooms' => 'id']
    ]);

    Route::group(['prefix' => 'password'], function() {
        Route::get('',[
            'as' => 'password.change',
            'uses' => 'ChangePasswordController@getChangePassword'
        ]);
        Route::post('',[
            'as' => 'password.change',
            'uses' => 'ChangePasswordController@postChangePassword'
        ]);
    });

    Route::group(['prefix' => 'users'], function(){
        Route::get('info/{id}',[
            'as' => 'admin.users.info',
            'uses' => 'UserController@info'
        ]);
        Route::post('info/change',[
            'as' => 'info.change',
            'uses' => 'UserController@changeInfo'
        ]);
        Route::get('add',[
            'as' => 'admin.users.add',
            'uses' => 'UserController@getAddUser'
        ]);
        Route::post('add',[
            'as' => 'admin.users.postadd',
            'uses' => 'UserController@postAddUser'
        ]);
        Route::get('admin',[
            'as' => 'admin.users.admin',
            'uses' => 'UserController@admin'
        ]);
        Route::delete('delete',[
            'as' =>'admin.users.delete',
            'uses' => 'UserController@delete'
        ]);
        Route::delete('deleteAll',[
            'as' => 'admin.users.deleteAll',
            'uses' => 'UserController@deleteAll'
        ]);
    });

    Route::group(['prefix' => 'contacts'], function() {
        Route::get('',[
            'as' => 'admin.contacts.index',
            'uses' => 'ContactController@index'
        ]);
        Route::get('delete',[
            'as' => 'admin.contacts.delete',
            'uses' => 'ContactController@delete'
        ]);
        Route::delete('delete',[
            'as' => 'admin.contacts.deleteAll',
            'uses' => 'ContactController@deleteAll'
        ]);
    });

    Route::post('check-user', 'UserController@check');
    Route::post('upload-image', 'MediaController@uploadImage');
});


// Guest routes
Route::group(['namespace' => 'Auth'], function() {
    Route::get('login', [
        'as' => 'admin.login.showLoginForm',
        'uses' => 'LoginController@showLoginForm'
    ]);
    Route::post('login', [
        'as' => 'admin.login.login',
        'uses' => 'LoginController@login'
    ]);
    Route::post('logout', [
        'as' => 'admin.login.logout',
        'uses' => 'LoginController@logout'
    ]);
    Route::get('password/reset', [
        'as' => 'password.request',
        'uses' => 'ForgotPasswordController@showLinkRequestForm'
    ]);
    Route::post('password/email', [
        'as' => 'password.email',
        'uses' => 'ForgotPasswordController@sendResetLinkEmail'
    ]);
    Route::post('password/reset', [
        'uses' => 'ResetPasswordController@reset'
    ]);

    Route::get('password/reset/{token}',[
        'as' => 'password.reset',
        'uses' => 'ResetPasswordController@showResetForm'
    ]);
});
