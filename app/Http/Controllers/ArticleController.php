<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('article/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article/create');
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

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('article/edit', ['article' => Article::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
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

        $article = Article::find($id);
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

        return view('article/edit', ['article' => Article::findOrFail($id)])->with('message', 'Updated Successfully!');
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
        //
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
