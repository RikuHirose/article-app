<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CommentRequest;
use App\Services\ImageService;

class UserController extends Controller
{
    public function __construct() {
        $this->imageService = new ImageService();
    }

    public function likesIndex(Request $request)
    {
        $user = \Auth::user();
        $user->load('likedArticles');

        return view('pages.user.like-index', [
            'user' => $user
        ]);
    }

    public function show(int $id, Request $request)
    {
        $user = User::find($id);
        $user->load('profile', 'articles.comments', 'likedArticles');

        return view('pages.user.show', [
            'user' => $user
        ]);
    }

    public function edit(int $id, Request $request)
    {
        $user = User::find($id);
        $user->load('profile');

        return view('pages.user.edit', [
            'user' => $user
        ]);
    }

    public function update(int $id, Request $request)
    {
        $user = User::find($id);
        $user->load('profile');

        $request->validate([
            'cover'        => 'image',
            'display_name' => 'string',
            'gender'       => 'numeric'
        ]);

        $input = $request->only($user->profile->getFillable());

        if ($request->hasFile('cover')) {

            $fullFilePath = $this->imageService->upload($request->file('cover'));

            $input['cover_url'] = $fullFilePath;
        }

        $user->profile->fill($input)->save();

        return redirect(route('users.show', $user->id));
    }



}
