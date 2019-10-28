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
        'as' => 'dashboard.index',
        'uses' => 'DashboardController@index'
    ]);

    // video
    Route::group(['prefix' => 'videos'], function() {
        Route::post('sort', [
            'as' => 'videos.sort',
            'uses' => 'VideoController@sort'
        ]);
        Route::post('change-is-public', [
            'as' => 'videos.change-is-public',
            'uses' => 'VideoController@changeIsPublic'
        ]);
        Route::post('change-is-highlight', [
            'as' => 'videos.change-is-highlight',
            'uses' => 'VideoController@changeIsHighlight'
        ]);
        Route::post('change-is-new', [
            'as' => 'videos.change-is-new',
            'uses' => 'VideoController@changeIsNew'
        ]);
        Route::delete('delete',[
            'as' => 'videos.deleteAll',
            'uses' => 'VideoController@deleteAll'
        ]);
        Route::get('movetop/{video?}',[
            'as' => 'videos.movetop',
            'uses' => 'VideoController@movetop',
        ]);
    });
    Route::resource('videos', 'VideoController',[
        'parameters' => ['videos' => 'id']
    ]);

    // video category
    Route::group(['prefix' => 'video-cats'], function() {
        Route::get('{id}/delete', [
            'as' => 'video-cats.delete',
            'uses' => 'VideoCategoryController@destroy'
        ]);
        Route::post('sortcat', [
            'as' => 'video-cats.sortcat',
            'uses' => 'VideoCategoryController@sortcat'
        ]);
    });
    Route::resource('video-cats', 'VideoCategoryController');

    // gallery
    Route::group(['prefix' => 'galleries'], function() {
        Route::post('{gallery}/process', [
            'as' => 'galleries.processImage',
            'uses' => 'GalleryController@processImage'
        ]);
        Route::get('{id}/delete', [
            'as' => 'galleries.delete',
            'uses' => 'GalleryController@destroy'
        ]);

        Route::post('sort', [
            'as' => 'galleries.sort',
            'uses' => 'GalleryController@sort'
        ]);

        Route::post('change-is-public', [
            'as' => 'galleries.change-is-public',
            'uses' => 'GalleryController@changeIsPublic'
        ]);

        Route::post('change-is-highlight', [
            'as' => 'galleries.change-is-highlight',
            'uses' => 'GalleryController@changeIsHighlight'
        ]);

        Route::post('change-is-new', [
            'as' => 'galleries.change-is-new',
            'uses' => 'GalleryController@changeIsNew'
        ]);


        Route::get('movetop/{gallery?}',[
            'as' => 'galleries.movetop',
            'uses' => 'GalleryController@movetop',
        ]);

        Route::delete('delete',[
            'as' => 'galleries.deleteAll',
            'uses' => 'GalleryController@deleteAll'
        ]);
    });
    Route::resource('galleries','GalleryController',[
        'parameters' => ['gallery' => 'id']
    ]);

    // gallery category
    Route::group(['prefix' => 'gallery-cats'], function () {
        Route::get('{id}/delete', [
            'as' => 'gallery-cats.delete',
            'uses' => 'GalleryCategoryController@destroy'
        ]);
        Route::post('sortcat', [
            'as' => 'gallery-cats.sortcat',
            'uses' => 'GalleryCategoryController@sortcat'
        ]);
    });
    Route::resource('gallery-cats', 'GalleryCategoryController',[
        'parameters' => ['gallery-cats' => 'id']
    ]);

    // article
    Route::group(['prefix' => 'articles'], function() {
        Route::get('{id}/delete', [
            'as' => 'articles.delete',
            'uses' => 'ArticleController@destroy'
        ]);
        Route::delete('delete',[
            'as' => 'articles.deleteAll',
            'uses' => 'ArticleController@deleteAll'
        ]);
        Route::post('sort', [
            'as' => 'articles.sort',
            'uses' => 'ArticleController@sort'
        ]);
        Route::post('update-view-status', 'ArticleController@updateViewStatus');
        Route::get('search', [
            'as' => 'articles.search',
            'uses' => 'ArticleController@search'
        ]);
        Route::get('movetop/{article?}',[
            'as' => 'articles.movetop',
            'uses' => 'ArticleController@movetop',
        ]);
        Route::get('category/{id}',[
            'as' => 'article.cat',    // article theo category id
            'uses' => 'ArticleCategoryController@articles'
        ]);
    });
    Route::resource('articles', 'ArticleController', [
        'parameters' => ['articles' => 'id']
    ]);

    Route::group(['prefix' => 'article-cats'], function() {
        Route::get('{id}/delete', [
            'as' => 'article-cats.delete',
            'uses' => 'ArticleCategoryController@destroy'
        ]);
        Route::post('sortcat', [
            'as' => 'article-cats.sortcat',
            'uses' => 'ArticleCategoryController@sortcat'
        ]);
    });
    Route::resource('article-cats', 'ArticleCategoryController');

    Route::group(['prefix' => 'settings'], function(){
        Route::get('', [
            'as' => 'setting.infoSetting',
            'uses' => 'SettingController@infoSetting'
        ]);
        Route::post('post-info-setting', [
            'as' => 'setting.postInfoSetting',
            'uses' => 'SettingController@postInfoSetting'
        ]);
        Route::get('send-mail', [
            'as' => 'setting.sendMail',
            'uses' => 'SettingController@sendMail'
        ]);
        Route::post('send-mail', [
            'as' => 'setting.postSendMail',
            'uses' => 'SettingController@postSendMail'
        ]);
        Route::get('seo', [
            'as' => 'setting.seo',
            'uses' => 'SettingController@seo'
        ]);
        Route::post('seo', [
            'as' => 'setting.postSeo',
            'uses' => 'SettingController@postSeo'
        ]);
        Route::get('email-content', [
            'as' => 'setting.emailContent',
            'uses' => 'SettingController@emailContent'
        ]);
        Route::get('email-content/add', [
            'as' => 'setting.addEmailContent',
            'uses' => 'SettingController@addEmailContent'
        ]);
        Route::post('email-content/add', [
            'as' => 'setting.postAddEmailContent',
            'uses' => 'SettingController@postAddEmailContent'
        ]);
        Route::get('email-content/edit/{id}', [
            'as' => 'setting.editEmailContent',
            'uses' => 'SettingController@editEmailContent'
        ]);
        Route::post('email-content/edit/{id}', [
            'as' => 'setting.postEditEmailContent',
            'uses' => 'SettingController@postEditEmailContent'
        ]);

    });

    Route::group(['prefix' => 'components'], function (){
        Route::get('', [
            'as' => 'components.index',
            'uses' => 'ComponentController@index'
        ]);
        Route::get('add',[
            'as' => 'components.create',
            'uses' => 'ComponentController@create'
        ]);
        Route::post('add', [
            'as' => 'components.store',
            'uses' => 'ComponentController@store'
        ]);
        Route::get('edit/{id}', [
            'as' => 'components.show',
            'uses' => 'ComponentController@show'
        ]);
        Route::post('edit/{id}', [
            'as' => 'components.update',
            'uses' => 'ComponentController@update'
        ]);
        Route::get('public', [
            'as' => 'components.changePublic',
            'uses' => 'ComponentController@changePublic'
        ]);
        Route::get('delete/{id}', [
            'as' => 'components.delete',
            'uses' => 'ComponentController@delete'
        ]);
    });

    Route::resource('showrooms', 'ShowroomController',[
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
            'as' => 'users.info',
            'uses' => 'UserController@info'
        ]);
        Route::post('info/change',[
            'as' => 'info.change',
            'uses' => 'UserController@changeInfo'
        ]);
        Route::get('add',[
            'as' => 'users.add',
            'uses' => 'UserController@getAddUser'
        ]);
        Route::post('add',[
            'as' => 'users.postadd',
            'uses' => 'UserController@postAddUser'
        ]);
        Route::get('admin',[
            'as' => 'users.admin',
            'uses' => 'UserController@admin'
        ]);
        Route::delete('delete',[
            'as' =>'users.delete',
            'uses' => 'UserController@delete'
        ]);
        Route::delete('deleteAll',[
            'as' => 'users.deleteAll',
            'uses' => 'UserController@deleteAll'
        ]);
    });

    Route::group(['prefix' => 'contacts'], function() {
        Route::get('',[
            'as' => 'contacts.index',
            'uses' => 'ContactController@index'
        ]);
        Route::get('delete',[
            'as' => 'contacts.delete',
            'uses' => 'ContactController@delete'
        ]);
        Route::delete('delete',[
            'as' => 'contacts.deleteAll',
            'uses' => 'ContactController@deleteAll'
        ]);
    });

    // product
    Route::group(['prefix' => 'products'], function() {

    });
    Route::resource('products', 'ProductController');

    // product category
    Route::group(['prefix' => 'product-categories'], function() {
        //
    });
    Route::resource('product-categories', 'ProductCategoryController');

    Route::post('check-user', 'UserController@check');
    Route::post('upload-image', 'MediaController@uploadImage');
});


// Guest routes
Route::group(['namespace' => 'Auth'], function() {
    Route::get('login', [
        'as' => 'login.showLoginForm',
        'uses' => 'LoginController@showLoginForm'
    ]);
    Route::post('login', [
        'as' => 'login.login',
        'uses' => 'LoginController@login'
    ]);
    Route::post('logout', [
        'as' => 'login.logout',
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
