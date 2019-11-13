<?php

namespace App\Http\Services;

use App\Models\Menu;


class MenuService
{
    public function sortData($items)
    {
		$order = array();
		// print_r($items);die;
		foreach ($items as $c) {
			$id      = str_replace('item_', '', $c);
			$order[] = Menu::findOrFail($id)->order;
		}
		rsort($order);
		foreach ($order as $k => $v) {
            Menu::where('id', str_replace('item_', '', $items[$k]))->update(['order' => $v]);
        }
    }
    
}