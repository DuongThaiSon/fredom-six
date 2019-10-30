<?php

namespace App\Http\Services\Traits;

use App\Models\Category;

trait CategoryTrait
{
    /**
     * Get all categories along with sub
     */
    public function allWithSub($process_id=null, $shoud_load_updater=false)
    {
        return $this->getSubCategories(0, $process_id, $shoud_load_updater);
    }

    /**
     * Get sub categories
     *
     * @param int parent cat id
     * @return Collection
     * @return null
     */
    protected function getSubCategories($parent_id, $process_id=null, $shoud_load_updater=false) {
        $condition = [];
        $condition[] = ['parent_id', $parent_id];
        $condition[] = ['type', $this->getCategoryType()];
        if ($process_id !== null) {
            $condition[] = ['id', '<>', $process_id];
        }
        $cat = Category::where($condition)->orderBy('order','desc')->get();
        if ($shoud_load_updater) {
            $cat->load('updater:id,name');
        }
        if ($cat->count() > 0) {
            $cat->map(function($q) use($process_id, $shoud_load_updater) {
                $sub = $this->getSubCategories($q->id, $process_id, $shoud_load_updater);
                $q->sub = $sub;
                return $q;
            });
        }
        return $cat;
    }

    /**
     * Get the Category type
     *
     * @return string
     */
    public function getCategoryType()
    {
        if (method_exists($this, 'categoryType')) {
            return $this->categoryType();
        }

        return property_exists($this, 'categoryType') ? $this->categoryType : '';
    }

    /**
     * Delete a category
     *
     * @param $id
     *
     * @return boolean
     */
    public function didDeleteCategory($id) {
        $category = Category::find($id);

        if (!$this->canDeleteCategory($id, [$id])) {
            return 0;
        }

        if ($category->avatar) {
            $this->deleteAvatar($category->id);
        }
        $category->delete();

        return 1;
    }

    /**
     * Delete multi categories
     *
     * @param array $ids
     *
     * @return boolean
     */
    public function didDeleteCategories(array $ids) {
        $categories = Category::find($ids);

        foreach($categories as $key=>$value) {
            if (!$this->canDeleteCategory($value->id, $ids)) {
                return 0;
            }
        }

        foreach($categories as $key=>$value) {
            if ($value->avatar) {
                $this->deleteAvatar($value->id);
            }
            $value->delete();
        }

        return 1;
    }

    /**
     * Check if category is valid to delete
     * A valid-to-delete is cateogry has no sub, no item inside,
     * or its sub are inside delete list
     *
     * @param $id
     * @param array $delete_list
     *
     * @return boolean
     */
    private function canDeleteCategory($id, array $delete_list) {
        // Check existence of category
        if (!$cat = Category::find($id)) {
            return 0;
        }
        // Verify that category contains no item
        $relation = \Str::plural($this->categoryType);
        if ($cat->$relation->count() > 0) {
            return 0;
        }
        $sub = Category::where('parent_id', $cat->id)->get();
        if ($sub->count() > 0) {
            foreach ($sub as $key=>$value) {
                // Verify that child category is also in delete list
                if (!in_array($value->id, $delete_list)) {
                    return 0;
                }
                // Check if child category is valid to delete
                if ($this->canDeleteCategory($value->id, $delete_list) == 0) {
                    return 0;
                }
            }
        }
        return 1;
    }

    /**
     * Delete category avatar
     *
     * @param $id
     */
    public function deleteAvatar($id) {
        $category = Category::find($id);
        $folder = public_path('media/category/');
        $fileName = $category->avatar;
        if (file_exists($folder . $fileName)) {
            unlink($folder . $fileName);
        }
        $category->avatar = '';
        $category->save();
    }

    /**
     * Exchange order of 2 categories
     *
     * @param $cats
     */
    public function order($cats) {
		$order = array();
		foreach ($cats as $c) {
			$id = str_replace('entry_', '', $c);
			$order[] = Category::find($id)->order;
        }
        rsort($order);
		foreach ($order as $k => $v) {
            Category::where('id', str_replace('entry_', '', $cats[$k]))->update(['order' => $v]);
        }

    }
}
