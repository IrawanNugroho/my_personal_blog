<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Article;
use App\Status;
use App\Category;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Article::select('slug')
            ->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_article = DB::table('articles')
                        ->join('statuses', 'statuses.id', '=', 'articles.status_id')
                        ->where('articles.active',1)
                        ->select('articles.id', 'articles.title', 'articles.updated_at', 'statuses.name as status')
                        ->paginate(15);
        
        return view('article/index', ['list_article' => $list_article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get list of status
        $list_status = Status::where('active', 1)->get(['id', 'name']);
        return view('article/create')->with('list_status', $list_status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'     => 'required|string|max:128',
            'slug'      => 'required|string|max:80',
            'excerpt'   => 'nullable|string|max:255',
            'content'   => 'nullable|string|max:15000',
            'tags'      => 'nullable|string|max:25',
            'author'    => 'nullable|string|max:25',
            'status'    => 'required|integer|max:2'
        ]);

        $article = new Article;
        $article->title     = $request->title;
        $article->slug      = $request->slug;
        $article->excerpt   = $request->excerpt;
        $article->content   = $request->content;
        $article->author    = $request->author;
        $article->slug      = $request->slug;
        $article->status_id = $request->status;
        $article->created_by= Auth::id();
        $article->updated_by= Auth::id();
        $article->save();

        return view('article/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = DB::table('articles')
                    ->join('statuses', 'statuses.id', '=', 'articles.status_id')
                    ->join('users', 'users.id', '=', 'articles.updated_by')
                    ->select('articles.id', 'articles.title', 'articles.content', 'articles.excerpt', 'articles.author', 'articles.slug', 'articles.slug as tags', 'statuses.id as status_id', 'articles.created_at', 'users.name as updated_by', 'articles.updated_at  as last_update')
                    ->where('articles.active', 1)
                    ->where('articles.id', '=', $id)
                    ->first();

        $list_status = Status::where('active', 1)->get(['id', 'name']);
        return view('article/show', ['article' => $article, 'list_status' => $list_status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = DB::table('articles')
                    ->join('statuses', 'statuses.id', '=', 'articles.status_id')
                    ->join('categories', 'categories.id', '=', 'articles.category_id')
                    ->select('articles.id', 'articles.title', 'articles.content', 'articles.excerpt', 'articles.author', 'articles.slug', 'categories.id as category_id', 'statuses.id as status_id')
                    ->where('articles.active', 1)
                    ->where('articles.id', '=', $id)
                    ->first();

        $list_status = Status::where('active', 1)->get(['id', 'name']);
        $list_category = Category::where('active',1)->get(['id', 'name']);
        
        return view('article/edit', ['list_category' => $list_category, 'article' => $article, 'list_status' => $list_status]);
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
        $validatedData = $request->validate([
            'title'     => 'required|string|max:128',
            'excerpt'   => 'nullable|string|max:255',
            'content'   => 'nullable|string|max:15000',
            'tags'      => 'nullable|string|max:25',
            'author'    => 'nullable|string|max:25',
            'status'    => 'required|integer|max:2'
        ]);

        $article = Article::find($id);
        $article->title     = Str::title($request->title);
        $article->slug      = $this->createSlug($request->title);
        $article->excerpt   = $request->excerpt;
        $article->content   = $request->content;
        $article->author    = $request->author;
        $article->status_id = $request->status;
        $article->category_id = $request->category;
        $article->created_by= Auth::id();
        $article->updated_by= Auth::id();
        $article->save();

        
        

        $list_status = Status::where('active', 1)->get(['id', 'name']);
        $list_category = Category::where('active',1)->get(['id', 'name']);
        
        return view('article/edit', ['list_category' => $list_category, 'article' => $article, 'list_status' => $list_status])->with('message', 'Updated Successfully!');
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
}
