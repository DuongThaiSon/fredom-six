<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Http\Services\ArticleService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Article;
use App\Models\User;
use Auth;

class ArticleController extends Controller
{
    const PER_PAGE =10;

    public function __construct(ArticleService $service)
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
        $articles = Article::orderBy('order', 'desc')->with('Category')->paginate(self::PER_PAGE);
        $categories = $this->getSubCategories(0);
        // print_r($categories->toArray());die;
        $users = User::all();
        return view('admin.articles.index', compact('articles','categories', 'users'));
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
    public function create(Request $request)
    {
        if(empty($request->id))
        {
            $categories = $this->getSubCategories(0);
            return view('admin.articles.create', compact('categories'));
        }
        else
        {
            $id = $request->id;
            $categories = $this->getSubCategories(0);
            $article = Article::findOrFail($id);
            $category = Category::find($article->category_id);
            return view('admin.articles.create', compact('categories', 'article', 'category'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $attributes = $this->service->Create($request, Article::max('order'), '/media/article/', $request->avatar);

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
        $category = Category::find($article->category_id);
        $categories = $this->getSubCategories(0);
        return view('admin.articles.edit', compact('article', 'categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
       $attributes = $this->service->Edit($request, '/media/article/', $request->avatar);

        $articles = Article::findOrFail($id);
        $article  = $articles->fill($attributes);
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
        $article = Article::findOrFail($id);

        $folder = public_path($article->avatar);
        if (file_exists($folder))
        {
            unlink($folder);
        }
        $article->delete();


        return redirect()->route('admin.articles.index')->with('DELETEED COMPLE');

    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        if(empty($ids)) {
            return 0;
        }else {
            foreach ($ids as $id) {
                Article::findOrFail($id)->delete();
            }
            return 1;
        }
        if (!$deleted) {
            return redirect()->back()->with('fail','Không có dữ liệu để xóa.');
        }
        return redirect()->back()->with('win','Xóa dữ liệu thành công.');
    }

    public function sort(Request $request)
    {
        $this->service->SortData($request);
    }

    public function changeIsPublic(Request $request) {

        $this->service->IsPublic(Article::findOrFail($request->id), $request);
        return response()->json(compact('article'), 200);

    }

    public function changeIsHighlight(Request $request) {

        $this->service->IsHighlight(Article::findOrFail($request->id), $request);;
        return response()->json(compact('article'), 200);
    }

    public function changeIsNew(Request $request) {

        $this->service->IsNew(Article::findOrFail($request->id), $request);
        return response()->json(compact('article'), 200);
    }

    public function CopyData($id)
    {
        $this->service->Copy(Article::findOrFail($id));

        return redirect()->route('admin.articles.index')->with('COPPIED');
    }

    public function search(Request $request)
    {
        // print_r($request->category_id);die;

        $categories = $this->getSubCategories(0);
        $users = User::all();


        $articles = Article::query();

        $fields = ['name', 'category_id', 'created_by'];
        foreach($fields as $field){
            if(!empty($request->$field)){
                $articles->where($field, 'like', '%' .$request->$field.'%');
            }
        }
        if (!empty($request->to_date) && !empty($request->from_date)) {
            $articles->whereBetween('created_at', [$request->to_date, $request->from_date]);
        }

        $articles = $articles->paginate(5);

        return view('admin.articles.index', compact('articles','categories','users'));
    }

    public function movetop(Article $article, Request $request){
        $condition = [];
        $condition[] = ['order', '>', $article->order];

        $otherArticles = Article::where($condition)->orderBy('order', 'asc')->get();

        foreach ($otherArticles as $otherArticle){
            $oldorder = $article->order;
            $article->order = $otherArticle->order;
            $otherArticle->order = $oldorder;
            $article->save();
            Article::where('id', $otherArticle->id)->update(['order' => $oldorder]);
        }
        if ($request->ajax()) {
            return 0;
        }
    }
}
