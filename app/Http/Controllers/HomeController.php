<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->with('user')->get();

        return view('home', [
            'articles' => $articles
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
