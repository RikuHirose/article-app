<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('welcome', [
            'articles' => $articles
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
