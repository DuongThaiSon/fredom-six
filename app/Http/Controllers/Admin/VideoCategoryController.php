<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\User;
use Auth;

class VideoCategoryController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $videoCat = Auth::user();
        $categories = $this->getSubCategories(0);
        // print_r($categories);die;
        return view('admin.videoCats.index', compact('categories'));
    }

    private function getSubCategories($parent_id, $ignore_id=null)
    {
        $categories = Category::where('parent_id', $parent_id)
            ->where('type', 'video')
            ->where('id', '<>', $ignore_id)
            ->orderBy('order', 'desc')
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
        return view('admin.videoCats.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
            'parent_id','name','description', 'detail', 'slug', 'meta_title',
            'meta_discription', 'meta_keyword','meta_page_topic', 'is_highlight'
        ]);
        $attributes['type']         = 'video';
        $user = Auth::user();
        $attributes['created_by']   = $user->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['order']        = Category::max('order') ? (Category::max('order') + 1) : 1;
        $attributes['slug']         = Str::slug($request->name,'-').$request->id;
        if ($request->hasFile('avatar')){
            $destinationDir = public_path('media/videoCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar']   = '/media/videoCategries/'.$filename;
        };

        $category = Category::create($attributes);

        return redirect()->route('admin.video-cats.edit', $category->id)
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
        $category = Category::findOrFail($id);
        $categories = $this->getSubCategories(0,$id);
        return view('admin.videoCats.edit', compact('categories','category'));
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
            'name' => 'required|unique:categories'.$id,
            'avatar' => 'nullable|sometimes|image'
        ]);

        $attributes = $request->only([
            'parent_id','name','description', 'detail', 'slug', 'meta_title',
            'meta_discription', 'meta_keyword','meta_page_topic', 'is_highlight'
        ]);
        $user                       = Auth::user();
        $attributes['updated_by']   = $user->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['slug']         = Str::slug($request->name,'-').$request->id;

        if ($request->hasFile('avatar')){
            $destinationDir = public_path('media/videoCategories');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = '/media/videoCategories/'.$filename;
        };
        $categories= Category::findOrFail($id);
        $category = $categories->fill($attributes);
        $category->save();

        return redirect()->route('admin.video-cats.edit', $category->id)

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
        $categoryid = $this->getSubCategories($id);
        $this->foreachlong($categoryid);
        Category::findOrFail($id)->delete();
        $categories = $this->getSubCategories(0);
        $category = $categories->filter(function($value, $key) use ($id){
            return $value->id == $id;
        });
        return redirect()->route('admin.video-cats.index')->with('xoá thành công');
    }
    public function sortcat(Request $request){
        $cats = $request->sort;
        $order = [];
		foreach ($cats as $c) {
            $id = str_replace('cat_', '', $c);

                if($id != ''){
                    $order[] = Category::findOrFail($id)->order;
                } else {
                    continue;
                }
        }
		rsort($order);
		foreach ($order as $k => $v) {
            Category::where('id', str_replace('cat_', '', $cats[$k]))->update(['order' => $v]);
        }
    }
    private function foreachlong($chil_id)
    {
        foreach ($chil_id as $key => $child) {
            $cat_child = $this->getSubCategories($child->id);
            if(!empty($cat_child))
            {
                Category::findOrFail($child->id)->delete();
            }
            else
            {
                $this->foreachlong($cat_child);
            }
        }
    }
}
