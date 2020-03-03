<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreArticleRequest;
use App\Http\Requests\Admin\UpdateArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Services\Admin\ArticleCategoryService;
use App\Services\Admin\ArticleService;

class ArticleController extends Controller
{
    public function __construct(ArticleService $articleService, ArticleCategoryService $articleCategoryService)
    {
        $this->articleService = $articleService;
        $this->articleCategoryService = $articleCategoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('order', 'desc')->with(['category', 'user'])->simplePaginate();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->articleCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Show the form for clone an exists resource.
     *
     * @param \App\Models\Article
     * @return \Illuminate\Http\Response
     */
    public function clone(Article $article)
    {
        $categories = $this->articleCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        $selectedId = $article->category_id;
        return view('admin.articles.create', compact('categories', 'article', 'selectedId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $attributes = $request->only([
            'category_id',
            'name',
            'is_public',
            'is_highlight',
            'is_new',
            'meta_title',
            'slug',
            'meta_keyword',
            'meta_description',
            'meta_page_topic',
            'description',
            'detail',
            'avatar',
            'icon'
        ]);
        $article = $this->articleService->create($attributes);
        return redirect()->route('admin.articles.edit', $article->id)->with('success', 'Article created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = $this->articleCategoryService->getSubCategories($parentId = 0, $processId = null, $shouldLoadUpdater = false);
        $selectedId = $article->category_id;
        return view('admin.articles.edit', compact('article', 'categories', 'selectedId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateArticleRequest  $request
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $attributes = $request->only([
            'category_id',
            'name',
            'is_public',
            'is_highlight',
            'is_new',
            'meta_title',
            'slug',
            'meta_keyword',
            'meta_description',
            'meta_page_topic',
            'description',
            'detail',
            'avatar',
            'icon'
        ]);
        $article = $this->articleService->update($attributes, $article);
        return redirect()->route('admin.articles.edit', $article->id)->with('success', 'Article updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($this->articleService->destroy($article)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function destroyMany(Request $request)
    {
        if ($this->articleService->destroyMany($request->ids)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }

    public function reorder(Request $request)
    {
        $this->articleService->reorder($request->sort, 'item_');
        return response()->json([], 204);
    }

    /**
     * Update article attribute [public, highlight, new]
     */
    public function updateViewStatus(Request $request)
    {
        $article = $this->articleService->updateViewStatus($request->id, $field = $request->field, $request->value);
        return response()->json(['value' => $article->$field], 200);
    }

    public function moveTop(Article $article)
    {
        if ($this->articleService->moveTop($article)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_move"
        ], 500);
    }
}
