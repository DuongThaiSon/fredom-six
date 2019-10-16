<?php

namespace App\Http\Services;

use App\Http\Services\Traits\HandleButtonDisplay;
use App\Http\Services\Traits\HandleUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use Auth;

class ArticleService
{
    use HandleUpload;
    use HandleButtonDisplay;
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

    public function RequestDataCreate($request)
    {
        $attributes                 = $request->only($this->attributes);
        $attributes['created_by']   = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public']    = isset($request->is_public)?1:0;
        $attributes['is_new']       = isset($request->is_new)?1:0;
        $attributes['order']        = Article::max('order') ? (Article::max('order') + 1) : 1;
        $attributes['slug']         = Str::slug($request->name,'-');

        return $attributes;
    }

    public function RequestDataEdit($request)
    {
        $attributes                 = $request->only($this->attributes);
        $attributes['updated_by']   = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public']    = isset($request->is_public)?1:0;
        $attributes['is_new']       = isset($request->is_new)?1:0;
        $attributes['slug']         = Str::slug($request->name,'-');

        return $attributes;
    }

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

    public function UploadImage($destinationDir, $name)
    {
        if($name) {
            $file                 = uniqid('leotive').'.'.$name->extension();
            $name->move(public_path($destinationDir), $file);
            $attributes['avatar'] = $destinationDir.$file;
        }
        return $attributes;
    }

    Public function Copy($article)
    {
        $new = $article->replicate();
        $new->save();
    }
}
