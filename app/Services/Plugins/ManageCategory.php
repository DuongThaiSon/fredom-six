<?php

namespace App\Services\Plugins;

use App\Models\Category;
use Illuminate\Support\Str;

trait ManageCategory
{
    /**
     * Get sub categories
     *
     * @param int parent cat id
     * @return Collection
     * @return null
     */
    public function getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false)
    {
        $condition = [];
        $condition[] = ['parent_id', $parentId];
        $condition[] = ['type', $this->getCategoryType()];
        if ($processId !== null) {
            $condition[] = ['id', '<>', $processId];
        }
        $cat = Category::where($condition)->orderBy('order', 'desc')->get();
        if ($shouldLoadUpdater) {
            $cat->load('updater:id,name');
        }
        if ($cat->count() > 0) {
            $cat->map(function ($q) use ($processId, $shouldLoadUpdater) {
                $sub = $this->getSubCategories($q->id, $processId, $shouldLoadUpdater);
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
     * Save a new category
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        if (array_key_exists('is_public', $attributes)) {
            $attributes['is_public'] = 1;
        } else {
            $attributes['is_public'] = 0;
        }
        if (array_key_exists('avatar', $attributes)) {
            $attributes['avatar'] = $this->uploadFile($attributes['avatar'], $this->getDestinationUploadDir());
        }
        if (!$attributes['slug']) {
            $slug = Str::slug($attributes['name'], '-');
            while (Category::where('slug', $slug)->get()->count() > 0) {
                $slug .= '-' . rand(0, 9);
            }
            $attributes['slug'] = $slug;
        }
        $attributes['type'] = $this->getCategoryType();
        $attributes['created_by'] = $attributes['updated_by'] = $this->guard()->id();
        $attributes['order'] = Category::max('order') + 1;
        $category = Category::create($attributes);

        return $category;
    }

    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param \App\Models\Category $category
     *
     * @return mixed
     */
    public function update(array $attributes, Category $category)
    {
        if (array_key_exists('is_public', $attributes)) {
            $attributes['is_public'] = 1;
        } else {
            $attributes['is_public'] = 0;
        }
        if (array_key_exists('avatar', $attributes)) {
            $attributes['avatar'] = $this->uploadFile($attributes['avatar'], $this->getDestinationUploadDir());
        }
        if (!$attributes['slug']) {
            $slug = Str::slug($attributes['name'], '-');
            while (Category::where('slug', $slug)->get()->count() > 0) {
                $slug .= '-' . rand(0, 9);
            }
            $attributes['slug'] = $slug;
        }
        $attributes['updated_by'] = auth()->guard('admin')->id();
        $category->fill($attributes);
        $category->save();

        return $category;
    }

    /**
     * Find data by id
     *
     * @param       $id
     *
     * @return mixed
     */
    public function findCategory($id)
    {
        return Category::where('id', $id)
            ->where('type', $this->categoryType)
            ->firstOrFail();
    }

    /**
     * Delete a category
     *
     * @param \App\Models\Category $category
     * @return boolean
     */
    public function destroy(Category $category)
    {
        if (!$this->canDeleteCategory($category->id, [$category->id])) {
            return false;
        }

        if ($category->avatar) {
            $this->deleteAvatar($category->id);
        }
        $category->delete();

        return true;
    }

    /**
     * Delete multi categories
     *
     * @param string $ids
     * @return boolean
     */
    public function destroyMany(string $ids)
    {
        $ids = explode(",", $ids);
        $categories = Category::find($ids);

        foreach ($categories as $value) {
            if (!$this->canDeleteCategory($value->id, $ids)) {
                return false;
            }
        }

        foreach ($categories as $value) {
            if ($value->avatar) {
                $this->deleteAvatar($value->id);
            }
            $value->delete();
        }

        return true;
    }

    /**
     * Check if category is valid to delete
     * A valid-to-delete is category has no sub, no item inside,
     * or its sub are inside delete list
     *
     * @param $id
     * @param array $delete_list
     *
     * @return boolean
     */
    private function canDeleteCategory($id, array $delete_list)
    {
        // Check existence of category
        if (!$cat = Category::find($id)) {
            return false;
        }
        // Verify that category contains no item
        $relation = \Str::plural($this->categoryType);
        if ($cat->$relation->count() > 0) {
            return false;
        }
        $subCategories = Category::where('parent_id', $cat->id)->get();
        if ($subCategories->count() > 0) {
            foreach ($subCategories as $value) {
                // Verify that child category is also in delete list
                if (!in_array($value->id, $delete_list)) {
                    return false;
                }
                // Check if child category is valid to delete
                if ($this->canDeleteCategory($value->id, $delete_list) == 0) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Delete category avatar
     *
     * @param $id
     */
    public function deleteAvatar($id)
    {
        $category = Category::find($id);
        $fileName = $category->avatar;
        if (file_exists($this->getDestinationUploadDir() . $fileName)) {
            unlink($this->getDestinationUploadDir() . $fileName);
        }
        $category->avatar = '';
        $category->save();
    }

    /**
     * Exchange order of 2 categories
     *
     * @param $categories
     * @param $prefix
     * @return boolean
     */
    public function reorder($categories, $prefix = 'entry_')
    {
        $ids = array();
        foreach ($categories as $category) {
            $ids[] = str_replace($prefix, '', $category);
        }
        $order = Category::find($ids)->sortByDesc('order')->pluck('order');
        foreach ($order as $key => $value) {
            Category::where('id', str_replace('entry_', '', $categories[$key]))->update(['order' => $value]);
        }

        return true;
    }
}
