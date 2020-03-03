<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use App\Services\Repositories\TranslationRepository;
use Yajra\DataTables\Facades\DataTables;

class TranslationService
{
    private $translationRepository;

    public function __construct(TranslationRepository $translationRepository)
    {
        $this->translationRepository = $translationRepository;
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

    public function allWithDatabases($locale)
    {
        $list = $this->translationRepository->getListTranslation($locale);

        return DataTables::of($list)
            ->setRowClass(function () {
                return 'ui-state-default';
            })
            ->addColumn('route', function ($row) {
                if ($row->id) {
                    return [
                        'edit' => route('admin.translations.edit', $row->id),
                        'destroy' => route('admin.translations.destroy', $row->id),
                    ];
                }
                return [
                    'edit' => null,
                    'destroy' => null,
                ];
            })
            ->addColumn('key', function ($row) {
                if ($row->namespace === "*") {
                    return "{$row->group}.{$row->item}";
                }
                return "{$row->namespace}::{$row->group}.{$row->item}";
            })
            ->make(true);
    }

    public function create(array $attributes)
    {
        return $this->translationRepository->create($attributes);
    }

    public function update($translationText, $translationId)
    {
        return $this->translationRepository->update($translationId, $translationText);
    }

    public function destroy($translationId)
    {
        return $this->translationRepository->delete($translationId);
    }
}
