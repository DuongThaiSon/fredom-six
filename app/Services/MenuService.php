<?php

namespace App\Services;

use App\Models\Menu;
use App\Services\Plugins\BaseModel;
use App\Services\Plugins\ManageItem;
use Illuminate\Support\Facades\Auth;

class MenuService extends BaseModel
{
    use ManageItem;

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    protected function model()
    {
        return Menu::class;
    }

    public function getMenuType()
    {
        return Menu::$MENU_TYPE;
    }

    public function getMenu($parentId, $categoryId, $ignoreId)
    {
        $result = $this->model->whereCategoryId($categoryId)
            ->whereParentId($parentId)
            ->where('id', '<>', $ignoreId)
            ->orderBy('order', 'desc')
            ->with(['user', 'category'])
            ->get()
            ->map(function ($query) use ($ignoreId, $categoryId) {
                $query->sub = $this->getMenu($query->id, $categoryId, $ignoreId);
                return $query;
            });

        return $result;
    }

    /**
     * Save a new item
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $attributes['created_by'] = $attributes['updated_by'] = $this->guard()->id();
        $attributes['order'] = $this->model->max('order') + 1;
        $entity = $this->model->create($attributes);
        $this->resetModel();

        return $entity;
    }

    /**
     * Update an item
     *
     * @param array $attributes
     * @return mixed
     */
    public function update(array $attributes, Menu $entity)
    {
        $attributes['updated_by'] = $this->guard()->id();
        $entity->fill($attributes);
        $entity->save();

        return $entity;
    }
}
