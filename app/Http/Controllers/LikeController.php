<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        Like::create([
            'article_id' => $request->input('article_id'),
            'user_id'    => \Auth::user()->id
        ]);

        return redirect()->back();
    }

    public function destroy(int $id, Request $request)
    {
        $like = Like::find($id);

        $like->delete();

        return redirect()->back();
    }
}
