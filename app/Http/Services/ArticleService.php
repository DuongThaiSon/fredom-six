<?php

namespace App\Http\Services;

use App\Http\Services\Traits\HandleButtonDisplay;
use App\Http\Services\Traits\RequestDataCreate;
use App\Http\Services\Traits\RequestDataEdit;
use App\Http\Services\Traits\HandleUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use Auth;

class ArticleService
{
    use HandleButtonDisplay;
    use RequestDataCreate;
    use RequestDataEdit;
    use HandleUpload;

    private $attributes = [
        'name',
        'category_id',
        'meta_title',
        'slug',
        'meta_description',
        'meta_keyword',
        'meta_page_topic',
        'avatar',
        'description',
        'detail',
        'is_new',
        'is_public',
        'is_highlight'
    ];

    public function SortData($request)
    {
        $items = $request->sort;
		$order = array();
		foreach ($items as $c) {
			$id      = str_replace('item_', '', $c);
			$order[] = Article::findOrFail($id)->order;
		}
		rsort($order);
		foreach ($order as $k => $v) {
            Article::where('id', str_replace('item_', '', $items[$k]))->update(['order' => $v]);
        }
    }

    Public function Copy($article)
    {
        $new = $article->replicate();
        $new->order = Article::max('order') ? (Article::max('order') + 1) : 1;
        $new->created_by = Auth::user()->id;
        $new->save();
    }
}
