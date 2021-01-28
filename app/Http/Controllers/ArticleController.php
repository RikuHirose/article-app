<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('pages.article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description'  => 'required|min:3',
        ]);

        $article = new Article();
        $article->title = $request->input('title');
        $article->description = $request->input('description');

        $article->save();

        return redirect(route('index'));
    }

    public function edit(int $id)
    {
        $article = Article::find($id);

        if (empty($article)) {
            return redirect(route('index'));
        }

        return view('pages.article.edit', [
            'article' => $article
        ]);
    }

    public function update(int $id, Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description'  => 'required|min:3',
        ]);

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->save();

        return redirect(route('index'));
    }

    public function destroy(int $id)
    {
        $article = Article::find($id);

        if (empty($article)) {
            return redirect(route('index'));
        }

        $article->delete();

        return redirect(route('index'));
    }
}
