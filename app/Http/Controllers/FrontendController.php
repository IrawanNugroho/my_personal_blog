<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Article;
use App\Status;
use App\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $article = Article::where('active',1)
                            ->orderBy('id', 'DESC')
                            ->take(3)
                            ->get(['title', 'excerpt']);

        
        return view('demo', ['list_article' => $article]);
    }
}
