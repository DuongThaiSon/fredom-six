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
        $category = Category::find($gallery->category_id);
        $categories = $this->getSubCategories(0);
        return view('admin.gallery.edit', compact('gallery','categories', 'category'));

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
            'category_id', 'name', 'link_to', 'description', 'detail', 'slug', 'meta_title',
            'meta_discription', 'meta_keyword', 'meta_page_topic',
            'is_highlight', 'is_public', 'is_new'
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
        $gallery = Gallery::findOrFail($id);

        $folder = public_path($gallery->avatar);
        if (file_exists($folder))
        {
            unlink($folder);
        }
        $gallery->delete();
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

        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['order'] = Image::max('order') ? (Image::max('order') + 1) : 1;
            if ($request->hasFile('name')) {
                    $destinationDir = public_path('media/uploadImg');
                    $filename = uniqid('leotive').'.'.$request->name->extension();
                    $request->name->move($destinationDir, $filename);
                    $attributes['name'] = '/media/uploadImg/'.$filename;
            }
            // print_r($request->hasFile('name'));die;
            // print_r($attributes['name']);die;
            $gallery = Gallery::findOrFail($id);
            $gallery->images()->create([
                'created_by' => Auth::user()->id,
                'name' => $attributes['name'],
                'is_public' => $attributes['is_public'],
                'order' => $attributes['order'] = Image::max('order') ? (Image::max('order') + 1) : 1,
                'caption' => $request->caption,
                'url' => $request->url,

            ]);

        return redirect()->route('admin.gallery.edit',$gallery->id)->with('succes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageEdit(Request $request, $id)
    {
        $image_id = $request->image_id;
        // print_r($image_id);die;s
        $gallery = Gallery::findOrFail($id);
        $image = Image::findOrFail($image_id);
        // print_r($image);die;
        // $image = Image::findOrFail($gallery->images->id);
        // return redirect()->route('admin.images.edit', [
        //     'id' => $gallery->id,
        //     'image_id' => $image_id
        // ]);
        // return redirect()->route('admin.images.edit', $gallery->id);
        return view('admin.images.edit', compact('gallery','image'));

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
        $gallery = Gallery::findOrFail($id);
        $image = Image::findOrFail($gallery->images()->first()->id);
        // $attributes['name'] = $image->name;
        if ($request->hasFile('name')) {
            $destinationDir = public_path('media/uploadImg');
            $filename = uniqid('leotive').'.'.$request->name->extension();
            $request->name->move($destinationDir, $filename);
            $attributes['name'] = '/media/uploadImg/'.$filename;
        }
        else
        {
            $attributes['name'] = $request->img_name;
        }
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $image->update([
            'name' => $attributes['name'],
            'is_public' => $attributes['is_public'],
            'caption' => $request->caption,
            'url' => $request->url,
        ]);

        return redirect()->back()->with('succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageDestroy($id)
    {
        $image = Image::findOrFail($id);
        $folder = public_path($image->name);
        if (file_exists($folder))
        {
            unlink($folder);
        }
        $image->delete();
        return redirect()->back()->with('Delete Compled');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        if(empty($ids)) {
            return 0;
        }else {
            foreach ($ids as $id) {
                Gallery::findOrFail($id)->delete();
            }
            return 1;
        }
        if (!$deleted) {
            return redirect()->back()->with('fail','Không có dữ liệu để xóa.');
        }
        return redirect()->back()->with('win','Xóa dữ liệu thành công.');
    }

    public function changeIsPublicImage(Request $request) {
        $id = $request->id;
        $image =  Image::findOrFail($id);
        $image->is_public = ($request->value == 1) ? '0' : '1';
        $image->save();
        return response()->json(compact('image'), 200);

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
