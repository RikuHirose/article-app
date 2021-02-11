<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::where('id', $id)->with('user', 'comments.user')->first();

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

    public function store(ArticleRequest $request)
    {
        $fileName = $request->file('image')->getClientOriginalName();

        Storage::putFileAs('public/images', $request->file('image'), $fileName);

        $fullFilePath = '/storage/images/'. $fileName;

        Article::create([
            'user_id'     => \Auth::user()->id,
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'img_url'     => $fullFilePath,
        ]);

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

    public function update(int $id, ArticleRequest $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description'  => 'required|min:3',
        ]);

        $article = Article::find($id);

        $article->fill([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ])->save();

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
