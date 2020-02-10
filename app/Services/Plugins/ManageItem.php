<?php

namespace App\Services\Plugins;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

trait ManageItem
{
    /**
     * Save a new item
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $attributes['is_public'] = array_key_exists('is_public', $attributes) ? 1 : 0;
        $attributes['is_highlight'] = array_key_exists('is_highlight', $attributes) ? 1 : 0;
        $attributes['is_new'] = array_key_exists('is_new', $attributes) ? 1 : 0;
        if (array_key_exists('avatar', $attributes)) {
            $attributes['avatar'] = $this->uploadFile($attributes['avatar'], $this->getDestinationUploadDir());
        }
        if (array_key_exists('slug', $attributes) && !$attributes['slug']) {
            $slug = Str::slug($attributes['name'], '-');
            while ($this->model->where('slug', $slug)->get()->count() > 0) {
                $slug .= '-' . rand(0, 9);
            }
            $attributes['slug'] = $slug;
        }
        $attributes['created_by'] = $attributes['updated_by'] = $this->guard()->id();
        $attributes['order'] = $this->model->max('order') + 1;
        $entity = $this->model->create($attributes);
        $this->resetModel();

        return $entity;
    }

    /**
     * Update a entity by id
     *
     * @param array $attributes
     * @param mixed $entity
     *
     * @return mixed
     */
    public function update(array $attributes, $entity)
    {
        $attributes['is_public'] = array_key_exists('is_public', $attributes) ? 1 : 0;
        $attributes['is_highlight'] = array_key_exists('is_highlight', $attributes) ? 1 : 0;
        $attributes['is_new'] = array_key_exists('is_new', $attributes) ? 1 : 0;
        if (array_key_exists('avatar', $attributes)) {
            $attributes['avatar'] = $this->uploadFile($attributes['avatar'], $this->getDestinationUploadDir());
        }
        if (array_key_exists('slug', $attributes) && !$attributes['slug']) {
            $slug = Str::slug($attributes['name'], '-');
            while ($this->model->where('slug', $slug)->get()->count() > 0) {
                $slug .= '-' . rand(0, 9);
            }
            $attributes['slug'] = $slug;
        }
        $attributes['updated_by'] = auth()->guard('admin')->id();
        $entity->fill($attributes);
        $entity->save();

        return $entity;
    }

    /**
     * Delete an entity
     *
     * @param mixed $entity
     * @return boolean
     */
    public function destroy($entity)
    {
        if ($entity->avatar) {
            $this->deleteAvatar($entity);
        }
        $entity->delete();

        return true;
    }

    /**
     * Delete multi entities
     *
     * @param string $ids
     * @return boolean
     */
    public function destroyMany(string $ids)
    {
        $ids = explode(",", $ids);
        $entities = $this->model->find($ids);

        foreach ($entities as $value) {
            if ($value->avatar) {
                $this->deleteAvatar($value);
            }
            $value->delete();
        }

        return true;
    }

    /**
     * Delete item avatar
     *
     * @param mixed
     */
    private function deleteAvatar($entity)
    {
        $fileName = $entity->avatar;
        if (file_exists($this->getDestinationUploadDir() . $fileName)) {
            unlink($this->getDestinationUploadDir() . $fileName);
        }
        $entity->avatar = '';
        $entity->save();
        $this->resetModel();
    }

    /**
     * Exchange order of 2 entities
     *
     * @param $entities
     * @param $prefix
     * @return boolean
     */
    public function reorder($entities, $prefix = 'entry_')
    {
        $ids = array();
        foreach ($entities as $entity) {
            $ids[] = str_replace($prefix, '', $entity);
        }
        $order = $this->model->find($ids)->sortByDesc('order')->pluck('order');
        foreach ($order as $key => $value) {
            $this->model->where('id', str_replace($prefix, '', $entities[$key]))->update(['order' => $value]);
        }

        return true;
    }

    /**
     * Move an entity to top order
     *
     * @param $entity
     * @return boolean
     */
    public function moveTop($entity)
    {
        $maxOrder = $this->model->max('order');
        $entity->order = $maxOrder + 1;
        $entity->save();
        return true;
    }

    /**
     * Update entity status
     *
     * @param string $id
     * @param string $field
     * @param string $value
     * @return mixed
     */
    public function updateViewStatus(string $id, string $field, string $value)
    {
        $entity = $this->model->findOrFail($id);
        $entity->$field = $value ? '0' : '1';
        $entity->save();
        $this->resetModel();
        return $entity;
    }

    public function datatablesList()
    {
        $list = $this->model
            ->orderBy('order', 'desc')
            ->with('user');

        return DataTables::of($list)
            ->setRowClass(function ($article) {
                return 'ui-state-default';
            })
            ->addColumn('user', function ($row) {
                return $row->user ? $row->user->name : '';
            })
            ->make(true);
    }

    public function find($id)
    {
        $model = $this->model->findOrFail($id);
        $this->resetModel();
        return $model;
    }
}
