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
    Route::resource('videos', 'VideoController',[
        'as' => 'admin',
        'parameters' => ['videos' => 'id']
    ])->except('destroy');

    Route::get('videos/{id}/delete', [
        'as' => 'admin.videos.delete',
        'uses' => 'VideoController@destroy'
    ]);

    Route::post('videos/sort', [
        'as' => 'admin.videos.sort',
        'uses' => 'VideoController@sort'
    ]);

    Route::post('videos/change-is-public', [
        'as' => 'admin.videos.change-is-public',
        'uses' => 'VideoController@changeIsPublic'
    ]);

    Route::post('videos/change-is-highlight', [
        'as' => 'admin.videos.change-is-highlight',
        'uses' => 'VideoController@changeIsHighlight'
    ]);

    Route::post('videos/change-is-new', [
        'as' => 'admin.videos.change-is-new',
        'uses' => 'VideoController@changeIsNew'
    ]);

    // Route::get('videos/{id}/copy', [
    //     'as' => 'admin.videos.copy',
    //     'uses' => 'VideoController@CopyData'
    // ]);

    // video category
    Route::resource('video-cats', 'VideoCategoryController', [
        'as' => 'admin',
        'parameters' => ['video-cats' => 'id']
    ])->except('destroy');

    Route::get('video-cats/{id}/delete', [
        'as' => 'admin.video-cats.delete',
        'uses' => 'VideoCategoryController@destroy'
    ]);

    Route::post('video-cats/sortcat', [
        'as' => 'admin.video-cats.sortcat',
        'uses' => 'VideoCategoryController@sortcat'
    ]);

    // gallery
    Route::resource('gallery','GalleryController',[
        'as' => 'admin',
        'parameters' => ['gallery' => 'id']
    ])->except('destroy');

    Route::get('gallery/{id}/delete', [
        'as' => 'admin.gallery.delete',
        'uses' => 'GalleryController@destroy'
    ]);

    Route::post('gallery/sort', [
        'as' => 'admin.gallery.sort',
        'uses' => 'GalleryController@sort'
    ]);

    Route::post('gallery/change-is-public', [
        'as' => 'admin.gallery.change-is-public',
        'uses' => 'GalleryController@changeIsPublic'
    ]);

    Route::post('gallery/change-is-highlight', [
        'as' => 'admin.gallery.change-is-highlight',
        'uses' => 'GalleryController@changeIsHighlight'
    ]);

    Route::post('gallery/change-is-new', [
        'as' => 'admin.gallery.change-is-new',
        'uses' => 'GalleryController@changeIsNew'
    ]);

    // gallery category
    Route::resource('gallery-cats', 'GalleryCategoryController',[
        'as' => 'admin',
        'parameters' => ['gallery-cats' => 'id']
    ])->except('destroy');

    Route::get('gallery-cats/{id}/delete', [
        'as' => 'admin.gallery-cats.delete',
        'uses' => 'GalleryCategoryController@destroy'
    ]);

    Route::post('gallery-cats/sortcat', [
        'as' => 'admin.gallery-cats.sortcat',
        'uses' => 'GalleryCategoryController@sortcat'
    ]);

    // article
    Route::resource('articles', 'ArticleController', [
        'as' => 'admin',
        'parameters' => ['articles' => 'id']
    ])->except('destroy');

    Route::get('articles/{id}/delete', [
        'as' => 'admin.articles.delete',
        'uses' => 'ArticleController@destroy'
    ]);

    Route::post('articles/sort', [
        'as' => 'admin.articles.sort',
        'uses' => 'ArticleController@sort'
    ]);

    Route::post('articles/change-is-public', [
        'as' => 'admin.articles.change-is-public',
        'uses' => 'ArticleController@changeIsPublic'
    ]);

    Route::post('articles/change-is-highlight', [
        'as' => 'admin.articles.change-is-highlight',
        'uses' => 'ArticleController@changeIsHighlight'
    ]);

    Route::post('articles/change-is-new', [
        'as' => 'admin.articles.change-is-new',
        'uses' => 'ArticleController@changeIsNew'
    ]);

    Route::get('articles/{id}/copy', [
        'as' => 'admin.articles.copy',
        'uses' => 'ArticleController@CopyData'
    ]);

    // article category
    Route::resource('article-cats', 'ArticleCategoryController', [
        'as' => 'admin',
        'parameters' => ['article-cats' => 'id']
    ])->except('destroy');

    Route::get('article-cats/{id}/delete', [
        'as' => 'admin.article-cats.delete',
        'uses' => 'ArticleCategoryController@destroy'
    ]);


    Route::post('article-cats/sortcat', [
        'as' => 'admin.article-cats.sortcat',
        'uses' => 'ArticleCategoryController@sortcat'
    ]);

    // image
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

        Route::get('images-edit', [
            'as' => 'admin.images.edit',
            'uses' => 'GalleryController@imageEdit'
        ]);

        Route::post('images-update', [
            'as' => 'admin.images.update',
            'uses' => 'GalleryController@imageUpdate'
        ]);
    });
    Route::get('images/{id}/delete',[
        'as' => 'admin.images.delete',
        'uses' => 'GalleryController@imageDestroy'
    ]);
    Route::post('images/change-is-public', [
        'as' => 'admin.images.change-is-public',
        'uses' => 'GalleryController@changeIsPublicImage'
    ]);

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
    Route::resource('showrooms', 'ShowroomController',[
        'as' => 'admin',
        'parameters' => ['showrooms' => 'id']
    ])->except('destroy');
    Route::get('showrooms/delete/{id}', [
        'as' => 'admin.showrooms.delete',
        'uses' => 'ShowroomController@destroy'
    ]);
    // Route::get('showrooms/public', [
    //     'as' => 'admin.showrooms.changePublic',
    //     'uses' => 'ShowroomController@changePublic'
    // ]);

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
        Route::delete('/delete',[
            'as' =>'user.delete',
            'uses' => 'UserController@delete'
        ]);
        Route::delete('/deleteAll',[
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



