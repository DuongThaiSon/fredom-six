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
    Route::group(['prefix' => 'video-categories'], function() {
        Route::get('{id}/delete', [
            'as' => 'video-categories.delete',
            'uses' => 'VideoCategoryController@destroy'
        ]);
        Route::post('sortcat', [
            'as' => 'video-categories.sortcat',
            'uses' => 'VideoCategoryController@sortcat'
        ]);
    });
    Route::resource('video-categories', 'VideoCategoryController');

    // gallery
    Route::group(['prefix' => 'galleries'], function() {
        Route::post('{gallery}/process', [
            'as' => 'galleries.processImage',
            'uses' => 'GalleryController@processImage'
        ]);
        Route::delete('{gallery}/revert/{image}', [
            'as' => 'galleries.revertImage',
            'uses' => 'GalleryController@revertImage'
        ]);
        Route::get('{id}/delete', [
            'as' => 'galleries.delete',
            'uses' => 'GalleryController@destroy'
        ]);

        Route::post('sort', [
            'as' => 'galleries.sort',
            'uses' => 'GalleryController@sort'
        ]);

        Route::post('sort-image', [
            'as' => 'galleries.sortImage',
            'uses' => 'GalleryController@sortImage'
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
    Route::group(['prefix' => 'gallery-categories'], function () {
        Route::get('{id}/delete', [
            'as' => 'gallery-categories.delete',
            'uses' => 'GalleryCategoryController@destroy'
        ]);
        Route::post('sortcat', [
            'as' => 'gallery-categories.sortcat',
            'uses' => 'GalleryCategoryController@sortcat'
        ]);
        Route::delete('delete-all', [
            'as' => 'gallery-categories.deleteAll',
            'uses' => 'GalleryCategoryController@deleteAll'
        ]);
    });
    Route::resource('gallery-categories', 'GalleryCategoryController',[
        'parameters' => ['gallery-categories' => 'id']
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

    Route::group(['prefix' => 'article-categories'], function() {
        Route::get('{id}/delete', [
            'as' => 'article-categories.delete',
            'uses' => 'ArticleCategoryController@destroy'
        ]);
        Route::post('sortcat', [
            'as' => 'article-categories.sortcat',
            'uses' => 'ArticleCategoryController@sortcat'
        ]);
        Route::delete('delete-all', [
            'as' => 'article-categories.deleteAll',
            'uses' => 'ArticleCategoryController@deleteAll'
        ]);
    });
    Route::resource('article-categories', 'ArticleCategoryController');

    Route::group(['prefix' => 'settings'], function(){
        // Route::get('', [
        //     'as' => 'settings.infoSetting',
        //     'uses' => 'SettingController@infoSetting'
        // ]);
        // Route::post('post-info-setting', [
        //     'as' => 'settings.postInfoSetting',
        //     'uses' => 'SettingController@postInfoSetting'
        // ]);
        // Route::get('send-mail', [
        //     'as' => 'settings.sendMail',
        //     'uses' => 'SettingController@sendMail'
        // ]);
        // Route::post('send-mail', [
        //     'as' => 'settings.postSendMail',
        //     'uses' => 'SettingController@postSendMail'
        // ]);
        // Route::get('seo', [
        //     'as' => 'settings.seo',
        //     'uses' => 'SettingController@seo'
        // ]);
        // Route::post('seo', [
        //     'as' => 'settings.postSeo',
        //     'uses' => 'SettingController@postSeo'
        // ]);
        // Route::get('email-content', [
        //     'as' => 'settings.emailContent',
        //     'uses' => 'SettingController@emailContent'
        // ]);
        // Route::get('email-content/add', [
        //     'as' => 'settings.addEmailContent',
        //     'uses' => 'SettingController@addEmailContent'
        // ]);
        // Route::post('email-content/add', [
        //     'as' => 'settings.postAddEmailContent',
        //     'uses' => 'SettingController@postAddEmailContent'
        // ]);
        // Route::get('email-content/edit/{id}', [
        //     'as' => 'settings.editEmailContent',
        //     'uses' => 'SettingController@editEmailContent'
        // ]);
        // Route::post('email-content/edit/{id}', [
        //     'as' => 'settings.postEditEmailContent',
        //     'uses' => 'SettingController@postEditEmailContent'
        // ]);


    });
    Route::resource('settings', 'SettingController');
    Route::resource('email-contents', 'EmailContentController', [
        'parameters' => [
            'email-contents' => 'emailContent'
        ]
    ]);


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
    Route::resource('orders', 'OrderController',[
        'parameters' => ['orders' => 'id']
    ]);

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
    Route::resource('menu-categories', 'MenuCategoryController', [
        'parameters' => ['menu-categories' => 'category']
        ]);
    Route::group(['prefix' => 'menus'], function () {
        Route::post('/sort', [
            'as' => 'menus.sort',
            'uses' => 'MenuController@sort'
        ]);
        Route::get('/list-articles', [
            'as' => 'menus.listArticle',
            'uses' => 'MenuController@listArticle']);
        Route::get('/list-products', 'MenuController@listProduct');
        Route::get('/get-article/{id}', 'MenuController@getArticle');
        Route::get('/get-product/{id}', 'MenuController@getProduct');
        Route::get('/search-articles', [
            'as' => 'menus.searchArticles',
            'uses' => 'MenuController@searchArticles'
        ]);

        Route::get('/search-products', [
            'as' => 'menus.searchProducts',
            'uses' => 'MenuController@searchProducts'
        ]);
        Route::get('/list-category-product', 'MenuController@listCategoryProduct');
        Route::get('/get-category-product/{id}', 'MenuController@getProductCategory');
        Route::get('/list-category-article', 'MenuController@listCategoryArticle');
        Route::get('/get-category-article/{id}', 'MenuController@getArticleCategory');
    });

    Route::resource('menus', 'MenuController');

    // product
    Route::delete('delete-many/products', [
        'as' => 'products.deleteMany',
        'uses' => 'ProductController@deleteMany'
    ]);
    Route::group(['prefix' => 'products'], function() {

        Route::post('fetch-attribute-option', [
            'as' => 'products.fetchAttributeOption',
            'uses' => 'ProductController@fetchAttributeOption'
        ]);
        Route::post('fetch-option', [
            'as' => 'products.fetchOption',
            'uses' => 'ProductController@fetchOption'
        ]);

        Route::group(['prefix' => '{product}'], function () {
            Route::post('process', [
                'as' => 'products.processImage',
                'uses' => 'ProductController@processImage'
            ]);
            Route::delete('revert/{image}', [
                'as' => 'products.revertImage',
                'uses' => 'ProductController@revertImage'
            ]);
            Route::post('reorder-variant', [
                'as' => 'variants.reorder',
                'uses' => 'ProductVariantController@reorder'
            ]);
            Route::resource('variants', 'ProductVariantController');
        });
    });
    Route::post('products-filters/delete', [
        'as' => 'admin.products-filters.delete',
        'uses' => 'FilterController@deleteMany'
    ]);
    Route::resource('products-filters', 'FilterController', [
        'parameters' => ['products-filters' => 'filters']
    ]);

    Route::get('products/import', [
        'as' => 'excel.index',
        'uses' => 'ExcelController@index'
    ]);
    Route::post('products/import/update', [
        'as' => 'excel.import',
        'uses' => 'ExcelController@import'
    ]);
    Route::get('products/export', [
        'as' => 'excel.export',
        'uses' => 'ExcelController@export'
    ]);
    Route::resource('products', 'ProductController');

    // product category
    Route::delete('delete-many/product-categories', [
        'as' => 'productCategories.deleteMany',
        'uses' => 'ProductCategoryController@deleteMany'
    ]);
    Route::group(['prefix' => 'product-categories'], function() {
        //
    });
    Route::resource('product-categories', 'ProductCategoryController', [
        'parameters' => [
            'product-categories' => 'category'
        ]
    ]);

    // product attribute
    Route::group(['prefix' => 'product-attributes'], function() {

    });
    Route::resource('product-attributes', 'ProductAttributeController');

    Route::post('check-user', 'UserController@check');
    Route::post('upload-image', 'MediaController@uploadImage');

    Route::get('files', [
        'as' => 'files',
        'uses' => 'FileController'
    ]);

    Route::group(['prefix' => 'backups'], function () {
        Route::get('download', [
            'as' => 'backups.download',
            'uses' =>'BackupController@download'
        ]);
        Route::delete('delete', [
            'as' => 'backups.destroy',
            'uses' => 'BackupController@destroy'
        ]);
    });
    Route::resource('backups', 'BackupController', [
        'only' => ['index', 'store']
    ]);

    //Addition route for Partners
    Route::group(['prefix' => 'partners'], function () {
        Route::delete('delete-many', [
            'as' => 'partners.deleteMany',
            'uses' => 'PartnerController@deleteMany'
        ]);
    });
    Route::resource('partners', 'PartnerController');

    Route::group(['prefix' => 'seo-tools'], function () {
        Route::delete('delete-many', [
            'as' => 'seo-tools.deleteMany',
            'uses' => 'SeoToolController@deleteMany'
        ]);
    });
    Route::resource('seo-tools', 'SeoToolController');

    Route::resource('reviews', 'ReviewController');

    Route::group(['prefix' => 'sitemap'], function () {
        Route::get('', [
            'as' => 'sitemap.index',
            'uses' => 'SitemapController@index'
        ]);
        Route::get('data', [
            'as' => 'sitemap.data',
            'uses' => 'SitemapController@data'
        ]);
    });
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



