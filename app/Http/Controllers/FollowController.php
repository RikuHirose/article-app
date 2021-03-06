<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        Follow::create([
            'from_user_id' => \Auth::user()->id,
            'to_user_id'   => $request->input('to_user_id'),
        ]);

        return redirect()->back();
    }

    public function destroy(int $id, Request $request)
    {
        $follow = Follow::find($id);

        $follow->delete();

        return redirect()->back();
    }
}
