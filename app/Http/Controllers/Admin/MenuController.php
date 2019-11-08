<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menuCats = $this->getSubMenus(0, $request->id);
        $category_id = $request->id;
        return view('admin.menus.index', compact('menuCats', 'category_id'));
    }

    private function getSubMenus($parent_id, $category_id, $ignore_id=null)
    {
        $menuCats = Menu::where('category_id', $category_id)
            ->where('parent_id', $parent_id)
            ->where('id', '<>', $ignore_id)
            ->with(['user'])
            ->get()
            ->map(function($query) use($ignore_id, $category_id) {
                $query->sub = $this->getSubMenus($query->id, $category_id,$ignore_id);
                return $query;
            });

        return $menuCats;
    }

    private function getSubCategories($parent_id, $ignore_id=null)
    {
        $menuCats = Menu::where('parent_id', $parent_id)
            ->where('id', '<>', $ignore_id)
            ->with(['user'])
            ->get()
            ->map(function($query) use($ignore_id) {
                $query->sub = $this->getSubCategories($query->id, $ignore_id);
                return $query;
            });

        return $menuCats;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(empty($request->id))
        {
            $menuCats = $this->getSubCategories(0);
            $category_id = $request->cat;
            return view('admin.menus.create', compact('menuCats','category_id'));
        }
        
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
            'parent_id' => 'numeric|min:0',
            'name' => 'required',
            'category_id' => 'required'
        ]);
        $attributes = $request->only([
            'name', 'parent_id', 'category_id'
        ]) ;
        $attributes['created_by'] = Auth::user()->id;
       
        $menus = Menu::create($attributes);
        

        return redirect()->back()->with('success','Lưu dữ liệu thành công');

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
        {
            $menus = Menu::findOrFail($id);
            $menu = Menu::find($menus->parent_id);
            $menuCats = $this->getSubCategories(0, $id);
            return view('admin.menus.edit', compact('menuCats', 'menus', 'menu'));
        }
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
            'parent_id' => 'numeric|min:0',
            'name' => 'required'
        ]);
        $attributes = $request->only([
            'name', 'parent_id', 
        ]) ;
        $attributes['created_by'] = Auth::user()->id;
        $attributes['category_id'] = $request->category_id;
        $menus = Menu::findOrFail($id);
        $menu  = $menus->fill($attributes);
        $menu->save();

        return redirect()->back()->with('success','Lưu dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function listArticle()
    {
        $articles = Article::simplePaginate(5);
        return view('admin.menus.list_articles', compact('articles'));
    }
}
