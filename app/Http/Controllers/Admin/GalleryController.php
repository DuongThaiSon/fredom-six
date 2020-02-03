<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGalleryRequest;
use App\Http\Requests\Admin\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Models\Image;
use App\Services\GalleryCategoryService;
use App\Services\GalleryService;
use App\Services\ImageService;

class GalleryController extends Controller
{
    public function __construct(GalleryService $galleryService, GalleryCategoryService $galleryCategoryService, ImageService $imageService)
    {
        $this->galleryService = $galleryService;
        $this->galleryCategoryService = $galleryCategoryService;
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('order', 'desc')->with(['category', 'user'])->paginate();
        return view('admin.galleries.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->galleryCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        return view('admin.galleries.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        $attributes = $request->only([
            'category_id',
            'name',
            'caption',
            'link_to',
            'is_public',
            'is_highlight',
            'is_new',
            'meta_title',
            'slug',
            'meta_keyword',
            'meta_description',
            'meta_page_topic',
            'description',
            'detail',
            'avatar',
        ]);
        $gallery = $this->galleryService->create($attributes);
        return redirect()->route('admin.galleries.edit', $gallery->id)->with('success', 'Gallery created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $categories = $this->galleryCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        $selectedId = $gallery->category_id;
        return view('admin.galleries.edit', compact('gallery', 'categories', 'selectedId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateGalleryRequest  $request
     * @param  \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $attributes = $request->only([
            'category_id',
            'name',
            'caption',
            'link_to',
            'is_public',
            'is_highlight',
            'is_new',
            'meta_title',
            'slug',
            'meta_keyword',
            'meta_description',
            'meta_page_topic',
            'description',
            'detail',
            'avatar',
        ]);
        $gallery = $this->galleryService->update($attributes, $gallery);
        return redirect()->route('admin.galleries.edit', $gallery->id)->with('success', 'Gallery updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if ($this->galleryService->destroy($gallery)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function destroyMany(Request $request)
    {
        if ($this->galleryService->destroyMany($request->ids)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function processImage(Request $request, Gallery $gallery)
    {
        $request->validate([
            'uploadImage.*' => 'required|image'
        ]);

        // print_r($request->uploadImage);die;
        foreach ($request->uploadImage as $file) {
            $this->galleryService->processImage($file, $gallery);
        }
        // $file = $request->file('uploadImage');
        // $this->galleryService->processImage($file, $gallery);

        return view('admin.galleries.imageShowcase', compact('gallery'));
    }

    public function revertImage(Gallery $gallery, Image $image)
    {
        $this->galleryService->revertImage($image);
        return view('admin.galleries.imageShowcase', compact('gallery'));
    }

    public function reorder(Request $request)
    {
        $this->galleryService->reorder($request->sort, 'item_');
        return response()->json([], 204);
    }

    /**
     * Update gallery attribute [public, highlight, new]
     */
    public function updateViewStatus(Request $request)
    {
        $gallery = $this->galleryService->updateViewStatus($request->id, $field = $request->field, $request->value);
        return response()->json(['value' => $gallery->$field], 200);
    }

    public function reorderImage(Request $request)
    {
        $this->imageService->reorder($request->sort, 'item_');
        return response()->json([], 204);
    }

    /**
     * Show the form for clone an exists resource.
     *
     * @param \App\Models\Gallery
     * @return \Illuminate\Http\Response
     */
    public function clone(Gallery $gallery)
    {
        $categories = $this->galleryCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        $selectedId = $gallery->category_id;
        return view('admin.galleries.create', compact('categories', 'gallery', 'selectedId'));
    }

    public function moveTop(Gallery $gallery)
    {
        if ($this->galleryService->moveTop($gallery)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_move"
        ], 500);
    }

    public function updateImageCaption(Image $image, Request $request)
    {
        $request->validate([
            'caption' => 'required'
        ]);
        $this->imageService->updateCaption($image, $request->caption);
        return response()->json([], 204);
    }
}
