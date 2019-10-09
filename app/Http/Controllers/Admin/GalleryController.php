<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Image;
use Auth;
use File;

class GalleryController extends Controller
{
    const PER_PAGE =10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->with('Category')->paginate(self::PER_PAGE);
        // print_r($galleries);die;
        return view('admin.gallery.index',compact('galleries'));
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
        return view('admin.gallery.create', compact('categories'));
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
            'avatar' => 'nullable|sometimes|image'
        ]);

        $attributes = $request->only([
            'category_id', 'name', 'caption','link_to', 'slug', 'meta_title',
            'meta_description', 'meta_keyword', 'meta_page_topic',
            'is_highlight', 'is_public', 'is_new'
        ]);
        $attributes['created_by'] = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['is_new'] = isset($request->is_new)?1:0;

        if($request->hasFile('avatar')){
            $destinationDir = public_path('media/galleryCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = '/media/galleryCategories'.$filename;
        }
        
        $gallery = Gallery::create($attributes);

        return redirect()->route('admin.gallery.edit', $gallery->id)->with('Success');
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
        $gallery = Gallery::findOrFail($id);
        $categories = $this->getSubCategories(0,$id);
        return view('admin.gallery.edit', compact('gallery','categories'));

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
            'avatar' => 'nullable|sometimes|image'
        ]);

        
        $attributes = $request->only([
            'category_id', 'name', 'link_to', 'description', 'detail', 'slug', 'meta_title',
            'meta_discription', 'meta_keyword', 'meta_page_topic',
            'is_highlight', 'is_public', 'is_new'
        ]);
        $user = Auth::user();
        $attributes['updated_by'] = $user->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['is_new'] = isset($request->is_new)?1:0;
        $attributes['order'] = Gallery::max('order') ? (Article::max('order') + 1) : 1;


        if($request->hasFile('avatar')){
            $destinationDir = public_path('media/galleryCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = '/media/galleryCategories'.$filename;
        }
        $galleries = Gallery::findOrFail($id);
        $gallery = $galleries->fill($attributes);
        $gallery->save();
        return redirect()->route('admin.gallery.edit', $gallery->id)->with('Success');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::findOrFail($id);
        return redirect()->route('admin.gallery.index')->with('Delete Comple');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageCreate($id)
    {
        $gallery = Gallery::findOrFail($id);
        // print_r($gallery->id);die;
        return view('admin.images.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageStore(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|sometimes|image'
        ]);
            if ($request->hasFile('name')) {
                foreach ($request->name as $name) {
                    $destinationDir = public_path('media/uploadImg');
                    $filename = uniqid('leotive').'.'.$name->extension();
                    $name->move($destinationDir, $filename);
                    $attributes['name'] = '/media/uploadImg/'.$filename;
                    
                   
                    $gallery = Gallery::find($id);
                    $gallery->images()->create([
                        'created_by' => Auth::user()->id,
                        'name' => $attributes['name'],
                    ]);
                }
            }

        return redirect()->route('admin.gallery.edit',$gallery->id)->with('succes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageEdit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $image = Image::findOrFail($gallery->images()->id);
        // $image = Image::findOrFail($gallery->images->id);
        // return redirect()->route('admin.images.edit', [
        //     'id' => $gallery->id,
        //     'image_id' => $image_id
        // ]);
        return view('admin.images.edit', compact('gallery', 'image', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageUpdate(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'nullable|sometimes|image'
        // ]);

        // $attributes = $request->only([
        //     'url', 'caption'
        // ]);

        // if($request->hasFile('name')) {
        //     $destinationDir = public_path('media/uploadImg');
        //     $filename = uniqid('leotive').'.'.$request->name->extension();
        //     $request->name->move($destinationDir, $filename);
        //     $attributes['name'] = '/media/uploadImg/'.$filename;
        // }

        // $images = Image::findOrFail($id);
        // $image = $image->fill($attributes);
        // $image->save();


        // return redirect()->route('admin.images.edit',$image->id)->with('succes');

        $request->validate([
            'name' => 'nullable|sometimes|image'
        ]);

        // $attributes = $request->only([
        //     'url', 'caption'
        // ]);

        // $user = Auth::user();
        // $attributes['created_by'] = $user->id;
        if($request->hasFile('name')) {
            $file = $request->file('name');
            $destinationDir = public_path('media/uploadImg');
            $filename = uniqid('leotive').'.'.$request->name->extension();
            $request->name->move($destinationDir, $filename);
            $attributes['name'] = '/media/uploadImg/'.$filename;
            // $attributes['size'] = filesize($file);
           
            // list($width, $height, $type, $attr) = getimagesize("'/media/uploadImg/'.$filename");
            // $attributes['size'] = $width.'x'.$height;
        }
        
        // $galleries = Gallery::findOrFail($id);
        $gallery = Gallery::find($id);
        $gallery->images()->update([
            'url' => $request->url,
            'caption' => $request->caption,
            'created_by' => Auth::user()->id,
            'name' => $attributes['name'] 
        ])->where('id', $gallery->images->id);

        return redirect()->route('admin.images.edit',$gallery->id, $gallery->images->id)->with('succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageDestroy($id)
    {
        Image::findOrFail($id)->delete();
        return redirect()->route('admin.gallery.edit')->with('Delete Comple');
    }
}
