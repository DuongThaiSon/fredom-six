<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\LanguageService;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    private $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->languageService->allWithDatatables();
        }
        return view('admin.languages.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attributes = $request->only([
            'name', 'locale'
        ]);
        $this->languageService->create($attributes);
        return response()->json([], 204);
    }

    public function show($id)
    {
        //
    }

    public function edit($languageId)
    {
        return response()->json([
            'language' => $this->languageService->findById($languageId)
        ], 200);
    }

    public function update(Request $request, $languageId)
    {
        $attributes = $request->only([
            'name', 'locale'
        ]);
        $this->languageService->update($attributes, $languageId);
        return response()->json([], 204);
    }

    public function destroy($languageId)
    {
        $this->languageService->destroy($languageId);
        return response()->json([], 204);
    }

    public function setLocale($locale)
    {
        session()->put('locale', $locale);
        app()->setLocale($locale);
        return response()->json([], 204);
    }
}
