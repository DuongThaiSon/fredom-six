<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Category;
use App\Models\User;
use Auth;

class VideoController extends Controller
{
    const PER_PAGE = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->with('Category')->paginate(self::PER_PAGE);
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.videos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|numeric|min:0',
            'name' => 'required|unique:categories',
            'image' => 'nullable|sometimes|image'
        ]);

        

        $attributes = $request->only([
            'category_id','name','url','description', 'detail', 'slug', 'meta_title', 
            'meta_description', 'meta_page_topic','meta_keyword',
            'is_highlight', 'is_public', 'is_new' 
        ]);
        if (Auth::check())
        {
            $attributes['created_by'] = Auth::user()->id;
        }

        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['is_new'] = isset($request->is_new)?1:0;

        if ($request->hasFile('image')){
            $destinationDir = public_path('media/video');
            $filename = uniqid('leotive').'.'.$request->image->extension();
            $request->image->move($destinationDir, $filename);
            $attributes['image'] = '/media/video/'.$filename;
        };

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
       $video = Video::findOrFail($id);
       $categories = $this->getSubCategories(0,$id);
    
       return view('admin.videos.edit', compact('categories','video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|numeric|min:0',
            'name' => 'required|unique:categories',
            'image' => 'nullable|sometimes|image'
        ]);

        $attributes = $request->only([
            'category_id','name','url','description', 'detail', 'slug', 
            'meta_title', 'meta_description', 'meta_page_topic','meta_keyword',
            'is_highlight', 'is_public', 'is_new' 
        ]);
        if (Auth::check())
        {
            $attributes['updated_by'] = Auth::user()->id;
        }
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['is_new'] = isset($request->is_new)?1:0;
        
        if ($request->hasFile('image')){
            $destinationDir = public_path('media/video');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['image'] = '/media/video/'.$filename;
        };
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
        Video::findOrFail($id)->delete();
        return redirect()->route('admin.videos.index')->with('xoá thành công');
    }
}
