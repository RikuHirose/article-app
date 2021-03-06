<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query();
        $articles = new Article();

        if (isset($query['text'])) {
            $text = $query['text'];

            // まずは$textからuseridを取得する
            // $userIds = Profile::where('display_name', 'like', "%{$text}%")->pluck('user_id');

            // $articles = $articles->whereIn('user_id', $userIds);
            // $articles = $articles->orWhere('title', 'like', "%{$text}%")
            //                 ->orWhere('description', 'like', "%{$text}%");

            $articles = $articles->whereIn('articles.user_id', function ($query) use ($text) {
                return $query->from('profiles')
                        ->select('profiles.user_id')
                        ->where('profiles.display_name', 'like', "%{$text}%");
            })
            ->orWhere('title', 'like', "%{$text}%")
            ->orWhere('description', 'like', "%{$text}%");
        }

        if (isset($query['order_by']) && $query['order_by'] === 'created_at_desc') {
            $articles = $articles->latest('created_at');
        }

        if (isset($query['order_by']) && $query['order_by'] === 'like_count_desc') {
            $articles = $articles->withCount('likes')->orderBy('likes_count', 'desc');
        }

        $articles = $articles->get();

        return view('home', [
            'articles' => $articles
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
