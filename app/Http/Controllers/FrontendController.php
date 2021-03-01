<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Article;
use App\Status;
use App\Category;
use App\Project;

class FrontendController extends Controller
{
    public function index()
    {
        // $article = Article::where('active',1)
        //                     ->where('status_id',3)
        //                     ->orderBy('id', 'DESC')
        //                     ->take(3)
        //                     ->get(['title', 'excerpt', 'slug']);

        $projects = Project::where('active',1)
                            ->where('status_id',3)
                            ->orderBy('id', 'DESC')
                            ->take(4)
                            ->get(['title', 'description']);


        
        return view('welcome', ['projects' => $projects]);
    }


    public function show($slug)
    {
        $article = DB::table('articles')
                    ->join('statuses', 'statuses.id', '=', 'articles.status_id')
                    ->join('users', 'users.id', '=', 'articles.updated_by')
                    ->join('categories', 'categories.id', '=', 'articles.category_id')
                    ->select('articles.id', 'articles.title', 'articles.content', 'articles.excerpt', 'articles.author', 'articles.slug', 'categories.name as category', 'statuses.name as status', 'articles.created_at', 'users.name as updated_by', 'articles.updated_at  as last_update')
                    ->where('articles.active', 1)
                    ->where('articles.slug', '=', $slug)
                    ->first();

        // return response()->json($article);
        return view('single', ['article' => $article]);
    }

}
