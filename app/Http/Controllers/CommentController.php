<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        Comment::create([
            'user_id'     => \Auth::user()->id,
            'article_id'  => $request->input('article_id'),
            'text'        => $request->input('text') ,
        ]);

        return redirect(route('articles.show', $request->input('article_id')));
    }
}
