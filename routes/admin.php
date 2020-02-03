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
Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('', [
        'as' => 'dashboard.index',
        'uses' => 'DashboardController@index'
    ]);

    // video
    Route::group(['prefix' => 'videos'], function () {
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
        Route::delete('delete', [
            'as' => 'videos.deleteAll',
            'uses' => 'VideoController@deleteAll'
        ]);
        Route::get('movetop/{video?}', [
            'as' => 'videos.movetop',
            'uses' => 'VideoController@movetop',
        ]);
    });
    Route::resource('videos', 'VideoController', [
        'parameters' => ['videos' => 'id']
    ]);

    // video category
    Route::group(['prefix' => 'video-categories'], function () {
        Route::post('reorder', [
            'as' => 'video-categories.reorder',
            'uses' => 'VideoCategoryController@reorder'
        ]);
        Route::delete('destroy-many', [
            'as' => 'video-categories.destroyMany',
            'uses' => 'VideoCategoryController@destroyMany'
        ]);
    });
    Route::resource('video-categories', 'VideoCategoryController', [
        'parameters' => ['video-categories' => 'category']
    ]);

    // gallery
    Route::group(['prefix' => 'galleries'], function () {
        Route::post('{gallery}/process', [
            'as' => 'galleries.processImage',
            'uses' => 'GalleryController@processImage'
        ]);
        Route::delete('{gallery}/revert/{image}', [
            'as' => 'galleries.revertImage',
            'uses' => 'GalleryController@revertImage'
        ]);
        Route::post('reorder-image', [
            'as' => 'galleries.reorderImage',
            'uses' => 'GalleryController@reorderImage'
        ]);
        Route::post('update-view-status', [
            'as' => 'galleries.updateViewStatus',
            'uses' => 'GalleryController@updateViewStatus'
        ]);
        Route::post('{gallery}/move-top', [
            'as' => 'galleries.moveTop',
            'uses' => 'GalleryController@moveTop',
        ]);
        Route::get('{gallery}/clone', [
            'as' => 'galleries.clone',
            'uses' => 'GalleryController@clone',
        ]);
        Route::post('reorder', [
            'as' => 'galleries.reorder',
            'uses' => 'GalleryController@reorder',
        ]);
        Route::delete('destroy-many', [
            'as' => 'galleries.destroyMany',
            'uses' => 'GalleryController@destroyMany',
        ]);
        Route::get('update-image-caption/{image}', [
            'as' => 'galleries.updateImageCaption',
            'uses' => 'GalleryController@updateImageCaption',
        ]);
    });
    Route::resource('galleries', 'GalleryController', [
        'parameters' => ['gallery' => 'id']
    ]);

    // gallery category
    Route::group(['prefix' => 'gallery-categories'], function () {
        Route::post('reorder', [
            'as' => 'gallery-categories.reorder',
            'uses' => 'GalleryCategoryController@reorder'
        ]);
        Route::delete('destroy-many', [
            'as' => 'gallery-categories.destroyMany',
            'uses' => 'GalleryCategoryController@destroyMany'
        ]);
    });
    Route::resource('gallery-categories', 'GalleryCategoryController', [
        'parameters' => ['gallery-categories' => 'category']
    ]);

    // article
    Route::group(['prefix' => 'articles'], function () {
        Route::post('update-view-status', [
            'as' => 'articles.updateViewStatus',
            'uses' => 'ArticleController@updateViewStatus'
        ]);
        Route::post('{article}/move-top', [
            'as' => 'articles.moveTop',
            'uses' => 'ArticleController@moveTop',
        ]);
        Route::get('{article}/clone', [
            'as' => 'articles.clone',
            'uses' => 'ArticleController@clone',
        ]);
        Route::post('reorder', [
            'as' => 'articles.reorder',
            'uses' => 'ArticleController@reorder',
        ]);
        Route::delete('destroy-many', [
            'as' => 'articles.destroyMany',
            'uses' => 'ArticleController@destroyMany',
        ]);
    });
    Route::resource('articles', 'ArticleController');

    Route::group(['prefix' => 'article-categories'], function () {
        Route::post('reorder', [
            'as' => 'article-categories.reorder',
            'uses' => 'ArticleCategoryController@reorder'
        ]);
        Route::delete('destroy-many', [
            'as' => 'article-categories.destroyMany',
            'uses' => 'ArticleCategoryController@destroyMany'
        ]);
    });
    Route::resource('article-categories', 'ArticleCategoryController', [
        'parameters' => [
            'article-categories' => 'category'
        ]
    ]);

    Route::group(['prefix' => 'settings'], function () { });
    Route::resource('settings', 'SettingController');
    Route::resource('email-contents', 'EmailContentController', [
        'parameters' => [
            'email-contents' => 'emailContent'
        ]
    ]);


    Route::group(['prefix' => 'components'], function () {
        Route::get('', [
            'as' => 'components.index',
            'uses' => 'ComponentController@index'
        ]);
        Route::get('add', [
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
    Route::resource('orders', 'OrderController', [
        'parameters' => ['orders' => 'id']
    ]);

    Route::group(['prefix' => 'password'], function () {
        Route::get('', [
            'as' => 'password.change',
            'uses' => 'ChangePasswordController@getChangePassword'
        ]);
        Route::post('', [
            'as' => 'password.change',
            'uses' => 'ChangePasswordController@postChangePassword'
        ]);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('info/{id}', [
            'as' => 'users.info',
            'uses' => 'UserController@info'
        ]);
        Route::post('info/change', [
            'as' => 'info.change',
            'uses' => 'UserController@changeInfo'
        ]);
        Route::get('add', [
            'as' => 'users.add',
            'uses' => 'UserController@getAddUser'
        ]);
        Route::post('add', [
            'as' => 'users.postadd',
            'uses' => 'UserController@postAddUser'
        ]);
        Route::get('admin', [
            'as' => 'users.admin',
            'uses' => 'UserController@admin'
        ]);
        Route::delete('delete', [
            'as' => 'users.delete',
            'uses' => 'UserController@delete'
        ]);
        Route::delete('deleteAll', [
            'as' => 'users.deleteAll',
            'uses' => 'UserController@deleteAll'
        ]);
    });

    Route::group(['prefix' => 'contacts'], function () {
        Route::get('', [
            'as' => 'contacts.index',
            'uses' => 'ContactController@index'
        ]);
        Route::get('delete', [
            'as' => 'contacts.delete',
            'uses' => 'ContactController@delete'
        ]);
        Route::delete('delete', [
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
            'uses' => 'MenuController@listArticle'
        ]);
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
    Route::group(['prefix' => 'products'], function () {

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
    Route::resource('products', 'ProductController');

    // product category
    Route::group(['prefix' => 'product-categories'], function () {
        Route::post('reorder', [
            'as' => 'product-categories.reorder',
            'uses' => 'ProductCategoryController@reorder'
        ]);
        Route::delete('destroy-many', [
            'as' => 'product-categories.destroyMany',
            'uses' => 'ProductCategoryController@destroyMany'
        ]);
    });
    Route::resource('product-categories', 'ProductCategoryController', [
        'parameters' => [
            'product-categories' => 'category'
        ]
    ]);

    // product attribute
    Route::group(['prefix' => 'product-attributes'], function () { });
    Route::resource('product-attributes', 'ProductAttributeController');

    Route::post('check-user', 'UserController@check');

    Route::get('files', [
        'as' => 'files',
        'uses' => 'FileController'
    ]);

    Route::group(['prefix' => 'backups'], function () {
        Route::get('download', [
            'as' => 'backups.download',
            'uses' => 'BackupController@download'
        ]);
        Route::delete('delete', [
            'as' => 'backups.destroy',
            'uses' => 'BackupController@destroy'
        ]);
        Route::get('import', [
            'as' => 'backups.import',
            'uses' => 'BackupController@import'
        ]);
        Route::post('restore', [
            'as' => 'backups.restore',
            'uses' => 'BackupController@restore'
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
        Route::post('generate', [
            'as' => 'sitemap.generate',
            'uses' => 'SitemapController@generate'
        ]);
        Route::get('show', [
            'as' => 'sitemap.show',
            'uses' => 'SitemapController@show'
        ]);
    });
});





// Guest routes
Route::group(['namespace' => 'Auth'], function () {
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
        'as' => 'password.update',
        'uses' => 'ResetPasswordController@reset'
    ]);

    Route::get('password/reset/{token}', [
        'as' => 'password.reset',
        'uses' => 'ResetPasswordController@showResetForm'
    ]);
});
