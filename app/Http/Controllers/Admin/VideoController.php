<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Http\Services\VideoService;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Video;
use App\Models\User;
use Auth;

class VideoController extends Controller
{
    const PER_PAGE = 10;

    public function __construct(VideoService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('order', 'desc')->with('Category')->paginate(self::PER_PAGE);
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Get the sub categories
     *
     * @param int $parent_id
     * @return mix
     */
    private function getSubCategories($parent_id, $ignore_id=null)
    {
        $categories = Category::where('parent_id', $parent_id)
        ->where('type','video')
        ->where('id','<>', $ignore_id)
        ->get()
        ->map(function($query) use($ignore_id){
            $query->sub = $this->getSubCategories($query->id, $ignore_id);
            return $query;
        });
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\ResponsSe
     */
    public function create(Request $request)
    {
        if(empty($request->id))
        {
            $categories = $this->getSubCategories(0);
            return view('admin.videos.create', compact('categories'));
        }
        else
        {
            $id = $request->id;
            $categories = $this->getSubCategories(0);
            $video = Video::findOrFail($id);
            return view('admin.videos.create', compact('categories', 'video'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {

        $attributes  = $this->service->Create($request, Video::max('order'), 'media/Videos/', $request->image);

        $video = Video::create($attributes);

        return redirect()->route('admin.videos.edit', $video->id)
        ->with('success', 'Tao moi thanh cong');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $video = Video::findOrFail($id)->load('category');
       $category = Category::find($video->category_id);
       $categories = $this->getSubCategories(0);

       return view('admin.videos.edit', compact('categories','video', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {

        $attributes = $this->service->Edit($request, 'media/Videos/', $request->image);

        $videos = Video::findOrFail($id);
        $video = $videos->fill($attributes);
        $video->save();

        return redirect()->route('admin.videos.edit', $video->id)
        ->with('success', 'Cap nhat thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $video = Video::findOrFail($id);
        $folder = public_path($video->avatar);
        if (file_exists($folder))
        {
            unlink($folder);
        }
        $video->delete();
        return redirect()->route('admin.videos.index')->with('DELETED COMPLE');
    }

    public function sort(Request $request)
    {

        $this->service->SortData($request);
    }

    public function changeIsPublic(Request $request)
    {

        $this->service->IsPublic(Video::findOrFail($request->id), $request);
        return response()->json(compact('video'), 200);

    }

    public function changeIsHighlight(Request $request)
    {

        $this->service->IsHighlight(Video::findOrFail($request->id), $request);;
        return response()->json(compact('video'), 200);
    }

    public function changeIsNew(Request $request)
    {

        $this->service->IsNew(Video::findOrFail($request->id), $request);
        return response()->json(compact('video'), 200);
    }

    // public function CopyData($id)
    // {
    //     $this->service->Copy(Video::findOrFail($id));

    //     return redirect()->route('admin.videos.index')->with('COPPIED');
    // }
}
