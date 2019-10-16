<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Auth;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.galleryCats.index', compact('categories'));
    }

    private function getSubCategories($parent_id, $ignore_id=null)
    {
        $categories = Category::where('parent_id', $parent_id)
            ->where('type', 'gallery')
            ->where('id', '<>', $ignore_id)
            ->get()
            ->map(function($query) use($ignore_id) {
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
        return view('admin.galleryCats.create', compact('categories'));
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
            'parent_id' => 'required|numeric|min:0',
            'name' => 'required|unique:categories',
            'avatar' => 'nullable|sometimes|image'
        ]);

        $attributes = $request->only([
            'parent_id','name','description', 'detail', 'slug',
            'meta_title', 'meta_discription', 'meta_keyword','meta_page_topic',
            'is_highlight', 'is_public'
        ]);

        $attributes['type'] = 'gallery';
        $user = Auth::user();
        $attributes['created_by'] = $user->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['order'] = Category::max('order') ? (Article::max('order') + 1) : 1;

        if ($request->hasFile('avatar')) {
            $destinationDir = public_path('media/galleryCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = '/media/galleryCategories/'. $filename;
        }

        $category = Category::create($attributes);

        return redirect()->route('admin.gallery-cats.edit', $category->id)->with('SUCCESS');
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
        $category = Category::findOrFail($id);
        $categories = $this->getSubCategories(0,$id);
        return view('admin.galleryCats.edit', compact('category', 'categories'));
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
            'parent_id' => 'required|numeric|min:0',
            'name' => 'required|unique:categories',
            'avatar' => 'nullable|sometimes|image'
        ]);

        $attributes = $request->only([
            'parent_id','name','description', 'detail', 'slug', 'meta_title',
            'meta_discription', 'meta_keyword','meta_page_topic',
            'is_highlight', 'is_public'
        ]);

        $user = Auth::user();
        $attributes['updated_by'] = $user->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public'] = isset($request->is_public)?1:0;

        if ($request->hasFile('avatar')) {
            $destinationDir = public_path('media/galleryCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = '/media/galleryCategories/'. $filename;
        }

        $categories = Category::findOrFail($id);

        $category = $categories->fill($attributes);
        $category->save();

        return redirect()->route('admin.gallery-cats.edit', $category->id)->with('update comple');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('admin.gallery-cats.index')->with('Delete Comple');

    }
}
