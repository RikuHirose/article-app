<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::where('id', $id)->first();

        if (empty($article)) {
            return redirect(route('index'));
        }

        return view('pages.article.show', [
            'article' => $article
        ]);
    }
}
