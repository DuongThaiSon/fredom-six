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
        Route::post('{video}/process', [
            'as' => 'videos.processImage',
            'uses' => 'VideoController@processImage'
        ]);
        Route::delete('{video}/revert/{image}', [
            'as' => 'videos.revertImage',
            'uses' => 'VideoController@revertImage'
        ]);
        Route::post('update-view-status', [
            'as' => 'videos.updateViewStatus',
            'uses' => 'VideoController@updateViewStatus'
        ]);
        Route::post('{video}/move-top', [
            'as' => 'videos.moveTop',
            'uses' => 'VideoController@moveTop',
        ]);
        Route::get('{video}/clone', [
            'as' => 'videos.clone',
            'uses' => 'VideoController@clone',
        ]);
        Route::post('reorder', [
            'as' => 'videos.reorder',
            'uses' => 'VideoController@reorder',
        ]);
        Route::delete('destroy-many', [
            'as' => 'videos.destroyMany',
            'uses' => 'VideoController@destroyMany',
        ]);
    });
    Route::resource('videos', 'VideoController');

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
        Route::get('{category}/make-child', [
            'as' => 'video-categories.makeChild',
            'uses' => 'VideoCategoryController@makeChild',
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
    Route::resource('galleries', 'GalleryController');

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
        Route::get('{category}/make-child', [
            'as' => 'gallery-categories.makeChild',
            'uses' => 'GalleryCategoryController@makeChild',
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
        Route::get('{category}/make-child', [
            'as' => 'article-categories.makeChild',
            'uses' => 'ArticleCategoryController@makeChild',
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

    Route::resource('components', 'ComponentController', [
        'parameters' => ['components' => 'id']
    ]);

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

    Route::group([
            'prefix' => 'users',
            'namespace' => 'User',
            'as' => 'users.'
        ], function () {
        Route::group(['prefix' => 'members'], function () {
            Route::get('list', [
                'as' => 'members.list',
                'uses' => 'MemberController@list'
            ]);
            Route::delete('destroy-many', [
                'as' => 'members.destroyMany',
                'uses' => 'MemberController@destroyMany',
            ]);
        });
        Route::resource('members', 'MemberController', [
            'parameters' => ['members' => 'id']
        ]);
        Route::group(['prefix' => 'admins'], function () {
            Route::get('list', [
                'as' => 'admins.list',
                'uses' => 'AdminController@list'
            ]);
            Route::delete('destroy-many', [
                'as' => 'admins.destroyMany',
                'uses' => 'AdminController@destroyMany',
            ]);
        });
        Route::resource('admins', 'AdminController', [
            'parameters' => ['admins' => 'id']
        ]);
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('index', [
                'as' => 'index',
                'uses' => 'ProfileController@index'
            ]);
            Route::get('edit', [
                'as' => 'edit',
                'uses' => 'ProfileController@edit'
            ]);
            Route::post('update', [
                'as' => 'update',
                'uses' => 'ProfileController@update'
            ]);
            Route::get('password', [
                'as' => 'showChangePasswordForm',
                'uses' => 'ProfileController@showChangePasswordForm'
            ]);
            Route::post('password', [
                'as' => 'changePassword',
                'uses' => 'ProfileController@changePassword'
            ]);
        });
    });

    Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
        Route::get('list', [
            'as' => 'list',
            'uses' => 'ContactController@list'
        ]);
        Route::delete('destroy-many', [
            'as' => 'destroyMany',
            'uses' => 'ContactController@destroyMany'
        ]);
    });
    Route::resource('contacts', 'ContactController');

    Route::group(['prefix' => 'menus'], function () {
        Route::get('list-article-categories', [
            'as' => 'menus.listArticleCategories',
            'uses' => 'MenuController@listArticleCategories',
        ]);
        Route::get('show-article-category', [
            'as' => 'menus.showArticleCategory',
            'uses' => 'MenuController@showArticleCategory',
        ]);
        Route::get('list-product-categories', [
            'as' => 'menus.listProductCategories',
            'uses' => 'MenuController@listProductCategories',
        ]);
        Route::get('show-product-category', [
            'as' => 'menus.showProductCategory',
            'uses' => 'MenuController@showProductCategory',
        ]);
        Route::get('list-articles', [
            'as' => 'menus.listArticles',
            'uses' => 'MenuController@listArticles',
        ]);
        Route::get('list-articles-datatables', [
            'as' => 'menus.listArticlesDatatables',
            'uses' => 'MenuController@listArticlesDatatables',
        ]);
        Route::get('show-article', [
            'as' => 'menus.showArticle',
            'uses' => 'MenuController@showArticle',
        ]);
        Route::get('list-products', [
            'as' => 'menus.listProducts',
            'uses' => 'MenuController@listProducts',
        ]);
        Route::get('list-products-datatables', [
            'as' => 'menus.listProductsDatatables',
            'uses' => 'MenuController@listProductsDatatables',
        ]);
        Route::get('show-product', [
            'as' => 'menus.showProduct',
            'uses' => 'MenuController@showProduct',
        ]);
        Route::post('reorder', [
            'as' => 'menus.reorder',
            'uses' => 'MenuController@reorder',
        ]);
        Route::delete('destroy-many', [
            'as' => 'menus.destroyMany',
            'uses' => 'MenuController@destroyMany',
        ]);
    });
    Route::group(['prefix' => 'menu-categories/{category}'], function () {
        Route::get('make-child/{menu}', [
            'as' => 'menus.makeChild',
            'uses' => 'MenuController@makeChild',
        ]);
        Route::resource('menus', 'MenuController');
    });
    Route::resource('menu-categories', 'MenuCategoryController', [
        'parameters' => ['menu-categories' => 'category']
    ]);

    Route::group(['prefix' => 'products'], function () {
        Route::post('update-view-status', [
            'as' => 'products.updateViewStatus',
            'uses' => 'ProductController@updateViewStatus'
        ]);
        Route::post('{product}/move-top', [
            'as' => 'products.moveTop',
            'uses' => 'ProductController@moveTop',
        ]);
        Route::get('{product}/clone', [
            'as' => 'products.clone',
            'uses' => 'ProductController@clone',
        ]);
        Route::post('reorder', [
            'as' => 'products.reorder',
            'uses' => 'ProductController@reorder',
        ]);
        Route::delete('destroy-many', [
            'as' => 'products.destroyMany',
            'uses' => 'ProductController@destroyMany',
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
            Route::resource('reviews', 'ProductReviewController');
        });
    });
    Route::resource('products', 'ProductController', [
        'parameters' => 'productId'
    ]);

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
        Route::get('{category}/make-child', [
            'as' => 'product-categories.makeChild',
            'uses' => 'ProductCategoryController@makeChild',
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
