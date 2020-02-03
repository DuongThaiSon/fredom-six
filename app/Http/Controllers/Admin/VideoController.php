<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVideoRequest;
use App\Http\Requests\Admin\UpdateVideoRequest;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Services\VideoCategoryService;
use App\Services\VideoService;

class VideoController extends Controller
{
    public function __construct(VideoService $videoService, VideoCategoryService $videoCategoryService)
    {
        $this->videoService = $videoService;
        $this->videoCategoryService = $videoCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('order', 'desc')->with(['category', 'user'])->simplePaginate();
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->videoCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        return view('admin.videos.create', compact('categories'));
    }

    /**
     * Show the form for clone an exists resource.
     *
     * @param \App\Models\Video
     * @return \Illuminate\Http\Response
     */
    public function clone(Video $video)
    {
        $categories = $this->videoCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        $selectedId = $video->category_id;
        return view('admin.videos.create', compact('categories', 'video', 'selectedId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {

        $attributes = $request->only([
            'category_id',
            'name',
            'url',
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
        $video = $this->videoService->create($attributes);
        return redirect()->route('admin.videos.edit', $video->id)->with('success', 'Video created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $categories = $this->videoCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        $selectedId = $video->category_id;
        return view('admin.videos.edit', compact('video', 'categories', 'selectedId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateVideoRequest  $request
     * @param  \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        $attributes = $request->only([
            'category_id',
            'name',
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
        $video = $this->videoService->update($attributes, $video);
        return redirect()->route('admin.videos.edit', $video->id)->with('success', 'Video updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        if ($this->videoService->destroy($video)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function destroyMany(Request $request)
    {
        if ($this->videoService->destroyMany($request->ids)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function reorder(Request $request)
    {
        $this->videoService->reorder($request->sort, 'item_');
        return response()->json([], 204);
    }

    /**
     * Update video attribute [public, highlight, new]
     */
    public function updateViewStatus(Request $request)
    {
        $video = $this->videoService->updateViewStatus($request->id, $field = $request->field, $request->value);
        return response()->json(['value' => $video->$field], 200);
    }

    public function moveTop(Video $video)
    {
        if ($this->videoService->moveTop($video)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_move"
        ], 500);
    }
}
