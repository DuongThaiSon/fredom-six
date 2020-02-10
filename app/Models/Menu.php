<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public static $CUSTOM_LINK = 0;
    public static $LINK_TO_ARTICLE_CATEGORY = 1;
    public static $SYNC_WITH_ARTICLE_CATEGORY = 2;
    public static $SYNC_WITH_ALL_ARTICLE_CATEGORIES = 3;
    public static $LINK_TO_ARTICLE = 4;
    public static $LINK_TO_PRODUCT_CATEGORY = 5;
    public static $SYNC_WITH_PRODUCT_CATEGORY = 6;
    public static $SYNC_WITH_ALL_PRODUCT_CATEGORIES = 7;
    public static $LINK_TO_PRODUCT = 8;

    public static $MENU_TYPE = [
        '0' => 'Link tuỳ chọn',
        '1' => '[Bài viết] Link đến một mục bài viết',
        '2' => '[Bài viết] Đồng bộ với toàn bộ mục con của một mục',
        '3' => '[Bài viết] Đồng bộ mục bài viết',
        '4' => '[Bài viết] Link đến bài viết chỉ định',
        '5' => '[Sản phẩm] Link đến một mục sản phẩm',
        '6' => '[Sản phẩm] Đồng bộ với toàn bộ mục con của một mục',
        '7' => '[Sản phẩm] Đồng bộ mục sản phẩm',
        '8' => '[Sản phẩm] Link đến sản phẩm chỉ định',
    ];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $casts = [
        'type' => 'integer'
    ];
}
