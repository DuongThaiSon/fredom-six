<?php

namespace App\Http\Services;

use App\Http\Services\Traits\HandleButtonDisplay;
use App\Http\Services\Traits\RequestDataCreate;
use App\Http\Services\Traits\RequestDataEdit;
use App\Http\Services\Traits\HandleUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Video;
use Auth;

class VideoService
{
    use HandleButtonDisplay;
    use RequestDataCreate;
    use RequestDataEdit;
    use HandleUpload;
    private $attributes = [
        'category_id',
        'name',
        'url',
        'description',
        'detail',
        'slug',
        'meta_title',
        'meta_description',
        'meta_page_topic',
        'meta_keyword',
        'is_highlight',
        'is_public',
        'is_new'
    ];

    public function SortData($request)
    {
        $items = $request->sort;
		$order = array();
		foreach ($items as $c) {
			$id      = str_replace('item_', '', $c);
			$order[] = Video::findOrFail($id)->order;
		}
		rsort($order);
		foreach ($order as $k => $v) {
            Video::where('id', str_replace('item_', '', $items[$k]))->update(['order' => $v]);
        }
    }
}
