<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Services\Plugins\BaseModel;
use App\Services\Plugins\HandleUpload;
use App\Services\Plugins\ManageItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductService extends BaseModel
{
    use HandleUpload, ManageItem;

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
     * Specify the upload directory
     */
    protected function destinationUploadDir()
    {
        return public_path(env('UPLOAD_DIR_PRODUCT', 'media/images/products'));
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    public function allWithDatatables()
    {
        $list = $this->model
            ->withoutVariation()
            ->orderBy('order', 'desc')
            ->with(['user', 'categories']);

        return DataTables::of($list)
            ->setRowClass(function () {
                return 'ui-state-default';
            })
            ->setRowId(function ($row) {
                return "item_{$row}";
            })
            ->addColumn('categories', function ($row) {
                return $row->categories->pluck('name')->implode(', ');
            })
            ->addColumn('user', function ($row) {
                return $row->user ? $row->user->name : '';
            })
            ->addColumn('route', function ($row) {
                return [
                    'edit' => route('admin.products.edit', $row->id),
                    'clone' => route('admin.products.clone', $row->id),
                    'moveTop' => route('admin.products.moveTop', $row->id),
                    'destroy' => route('admin.products.destroy', $row->id),
                ];
            })
            ->make(true);
    }

    public function create(array $attributes)
    {
        $attributes['is_public'] = array_key_exists('is_public', $attributes) ? 1 : 0;
        $attributes['is_highlight'] = array_key_exists('is_highlight', $attributes) ? 1 : 0;
        $attributes['is_new'] = array_key_exists('is_new', $attributes) ? 1 : 0;
        $attributes['is_taxable'] = array_key_exists('is_taxable', $attributes) ? 1 : 0;
        if (array_key_exists('avatar', $attributes)) {
            $attributes['avatar'] = $this->uploadImage($attributes['avatar'], $this->getDestinationUploadDir());
        }
        if (array_key_exists('category_id', $attributes)) {
            $categoryIds = explode(',', $attributes['category_id']);
            unset($attributes['category_id']);
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
        $entity->categories()->sync($categoryIds);
        $this->resetModel();

        return $entity;
    }
}
