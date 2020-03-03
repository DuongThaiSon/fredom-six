<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use Waavi\Translation\Repositories\LanguageRepository;
use Yajra\DataTables\Facades\DataTables;

class LanguageService
{
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function allWithDatatables()
    {
        $list = $this->languageRepository->all();

        return DataTables::of($list)
            ->setRowClass(function () {
                return 'ui-state-default';
            })
            ->addColumn('route', function ($row) {
                return [
                    'edit' => route('admin.languages.edit', $row->id),
                    'destroy' => route('admin.languages.destroy', $row->id),
                ];
            })
            ->make(true);
    }

    public function create(array $attributes)
    {
        return $this->languageRepository->create($attributes);
    }

    public function update(array $attributes, $languageId)
    {
        $attributes['id'] = $languageId;
        return $this->languageRepository->update($attributes);
    }

    public function destroy($languageId)
    {
        return $this->languageRepository->delete($languageId);
    }

    public function findById($languageId)
    {
        $language = $this->languageRepository->find($languageId);
        if (!$language) abort(404);
        return $language;
    }
}
