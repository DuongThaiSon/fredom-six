<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Support\Str;
use Auth;
use File;
use Optix\Media\MediaUploader;

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
        $galleries = Gallery::orderBy('order', 'desc')->with('Category')->paginate(self::PER_PAGE);
        return view('admin.galleries.index',compact('galleries'));
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
        return view('admin.galleries.create', compact('categories'));
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
        $attributes['created_by']   = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public']    = isset($request->is_public)?1:0;
        $attributes['is_new']       = isset($request->is_new)?1:0;
        $attributes['order']        = Gallery::max('order') ? (Gallery::max('order') + 1) : 1;
        $attributes['slug']         = Str::slug($request->name,'-').$request->id;

        if($request->hasFile('avatar')){
            $destinationDir = public_path('media/galleryCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = '/media/galleryCategories/'.$filename;
        }

        $gallery = Gallery::create($attributes);

        return redirect()->route('admin.galleries.edit', $gallery->id)->with('Success');
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
    public function edit(Gallery $gallery)
    {
        $category = Category::find($gallery->category_id);
        $categories = $this->getSubCategories(0);
        return view('admin.galleries.edit', compact('gallery','categories', 'category'));

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
        $attributes = $request->only([
            'category_id',
            'name',
            'link_to',
            'description',
            'detail',
            'slug',
            'meta_title',
            'meta_discription',
            'meta_keyword',
            'meta_page_topic',
            'is_highlight',
            'is_public',
            'is_new',
        ]);
        $user = Auth::user();
        $attributes['updated_by']   = $user->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public']    = isset($request->is_public)?1:0;
        $attributes['is_new']       = isset($request->is_new)?1:0;
        $attributes['slug']         = Str::slug($request->name,'-').$request->id;


        if($request->hasFile('avatar')){
            $destinationDir = public_path('media/galleryCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = '/media/galleryCategories/'.$filename;
        }
        $galleries = Gallery::findOrFail($id);
        $gallery = $galleries->fill($attributes);
        $gallery->save();
        if ($request->has('image_captions')) {
            $image_captions = $request->image_captions;
            foreach ($gallery->images()->get() as $item) {
                $item->caption = $image_captions[$item->id];
                $item->save();
            }
        }

        return redirect()->route('admin.galleries.edit', $gallery->id)->with('Success');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        $folder = public_path($gallery->avatar);
        if (file_exists($folder))
        {
            unlink($folder);
        }
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('Delete Comple');
    }


    public function processImage(Request $request, Gallery $gallery)
    {
        $request->validate([
            'uploadImage' => 'required|image'
        ]);

        $destinationPath = public_path(env('UPLOAD_DIR_GALLERY', 'media/galleries')); // upload path
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
            $gitignore = '.gitignore';
            $text = "*\n!.gitignore\n";
            file_put_contents($destinationPath.'/'.$gitignore, $text);
        }

        $file = $request->file('uploadImage');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = uniqid(date('d.m.Y')) . '.' . $extension; // renameing image
        // $file->move($destinationPath, $fileName); // upload origin file to given path
        $uploadImage = \Image::make($file); //
        $uploadImage->save($destinationPath.'/'.$fileName); // upload file with reduce quality
        $currentOrder = \App\Models\Image::max('order');
        $gallery->images()->create([
            'name' => $fileName,
            'size' => $file->getClientSize(),
            'mime' => $file->getClientMimeType(),
            'order' => $currentOrder?$currentOrder+1:1,
            'created_by' => auth()->guard('admin')->id(),
            'updated_by' => auth()->guard('admin')->id()
        ]);

        return view('admin.galleries.imageShowcase', compact('gallery'));
    }

    public function revertImage(Gallery $gallery, Image $image)
    {
        $destinationPath = public_path(env('UPLOAD_DIR_GALLERY', 'media/galleries'));
        $fileName = $image->name;
        if (file_exists($destinationPath.'/'.$fileName)) {
            unlink($destinationPath.'/'.$fileName);
        }
        $image->delete();
        return view('admin.galleries.imageShowcase', compact('gallery'));
    }

    public function sort(Request $request)
    {
        $items = $request->sort;
		$order = array();
		foreach ($items as $c) {
			$id      = str_replace('item_', '', $c);
			$order[] = Gallery::findOrFail($id)->order;
		}
		rsort($order);
		foreach ($order as $k => $v) {
            Gallery::where('id', str_replace('item_', '', $items[$k]))->update(['order' => $v]);
        }
    }

    public function changeIsPublic(Request $request) {
        $id = $request->id;
        $gallery =  Gallery::findOrFail($id);
        $gallery->is_public = ($request->value == 1) ? '0' : '1';
        $gallery->save();
        return response()->json(compact('gallery'), 200);

    }

    public function changeIsHighlight(Request $request) {

        $id = $request->id;
        $gallery =  Gallery::findOrFail($id);
        $gallery->is_highlight = ($request->value == 1) ? '0' : '1';
        $gallery->save();
        return response()->json(compact('gallery'), 200);
    }

    public function changeIsNew(Request $request) {

        $id = $request->id;
        $gallery =  Gallery::findOrFail($id);
        $gallery->is_new = ($request->value == 1) ? '0' : '1';
        $gallery->save();
        return response()->json(compact('gallery'), 200);
    }

    public function CopyData($id)
    {
        $this->service->Copy(Article::findOrFail($id));

        return redirect()->route('admin.articles.index')->with('COPPIED');
    }

    public function movetop(Gallery $gallery, Request $request){
        $condition = [];
        $condition[] = ['order', '>', $gallery->order];

        $otherGallerys = Gallery::where($condition)->orderBy('order', 'asc')->get();

        foreach ($otherGallerys as $otherGallery){
            $oldorder = $gallery->order;
            $gallery->order = $otherGallery->order;
            $otherGallery->order = $oldorder;
            $gallery->save();
            Gallery::where('id', $otherGallery->id)->update(['order' => $oldorder]);
        }
        if ($request->ajax()) {
            return 0;
        }
    }
}
