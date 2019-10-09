<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Article;
use Auth;

class ArticleController extends Controller
{
    const PER_PAGE =10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::orderBy('order', 'desc')->with('Category')->paginate(self::PER_PAGE);
        return view('admin.articles.index', compact('articles'));
    }

    private function getSubCategories($parent_id, $ignore_id=null)
    {
        $Categories = Category::where('parent_id', $parent_id)
            ->where('type', 'article')
            ->where('id', '<>', $ignore_id)
            ->get()
            ->map(function($query) use($ignore_id) {
                $query->sub = $this->getSubCategories($query->id, $ignore_id);
                return $query;  
            });
        
        return $Categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.articles.create', compact('categories'));
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
            'name' => 'required',
            'category_id' => 'required|numeric|min:0',
            'meta_title' => 'required',
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'meta_page_topic' => 'required',
            'avatar' => 'nullable|sometimes|image',
            'description' => 'required',
            'detail' => 'required'
        ]);

        $attributes = $request->only([
            'name', 'category_id', 'meta_title', 'slug', 'meta_description', 'meta_keyword', 'meta_page_topic', 
            'avatar', 'description', 'detail', 'is_new', 'is_public', 'is_highlight'
        ]);
        
        $attributes['created_by'] = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['is_new'] = isset($request->is_new)?1:0;
        $attributes['order'] = Article::max('order') ? (Article::max('order') + 1) : 1;

        if($request->hasFile('avatar')) {
            $destinationDir = public_path('media/Article');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = 'media/Articles/'.$filename;
        }

        $article = Article::create($attributes);

        return redirect()->route('admin.articles.edit', $article->id)->with('Added Article');

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
        $article = Article::findOrFail($id);
        $categories = $this->getSubCategories(0,$id);

        return view('admin.articles.edit', compact('article', 'categories'));
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
            'name' => 'required',
            'category_id' => 'required|numeric|min:0',
            'meta_title' => 'required',
            'slug' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'meta_page_topic' => 'required',
            'avatar' => 'nullable|sometimes|image',
            'description' => 'required',
            'detail' => 'required'
        ]);

        $attributes = $request->only([
            'name', 'category_id', 'meta_title', 'slug', 'meta_description', 'meta_keyword', 'meta_page_topic', 
            'avatar', 'description', 'detail', 'is_new', 'is_public', 'is_highlight'
        ]);
        
        $attributes['updated_by'] = Auth::user()->id;
        $attributes['is_highlight'] = isset($request->is_highlight)?1:0;
        $attributes['is_public'] = isset($request->is_public)?1:0;
        $attributes['is_new'] = isset($request->is_new)?1:0;

        if($request->hasFile('avatar')) {
            $destinationDir = public_path('media/Article');
            $filename = uniqid('leotive').'.'.$request->avatar->extension();
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = 'media/Articles/'.$filename;
        }

        $articles = Article::findOrFail($id);
        $article = $articles->fill($attributes);
        $article->save();

        return redirect()->route('admin.articles.edit', $article->id)->with('EDITED COMPLE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
        return redirect()->route('admin.articles.index')->with('DELETEED COMPLE');
    }
    public function sort(Request $request){
        $items = $request->sort;
		$order = array();
		foreach ($items as $c) {
			$id = str_replace('item_', '', $c);
			$order[] = Article::findOrFail($id)->order;
		}
		rsort($order);
		foreach ($order as $k => $v) {
            Article::where('id', str_replace('item_', '', $items[$k]))->update(['order' => $v]);
        }
    }
}
