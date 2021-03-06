<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowsController extends Controller
{
    /**
     * フォローする
     */
    public function __invoke(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', '自分自身をフォローすることはできません。');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return response()->json([
            'name' => $name
        ]);
    }
}
