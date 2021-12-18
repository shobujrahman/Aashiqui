<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowControler extends Controller
{
    public function followUser(Request $request)
    {
        $user = auth()->user();
         if ($user->isFollowing($request->userId)) {
            return response()->json([
                'success' => false,
                'message' => 'You are already following this user'
            ]);
        }
        $user->following()->attach($request->userId);
        return response()->json(['success' => true]);
    }
    
    
    public function followLists()
    {
        $user = auth()->user();
        $followers = $user->followers()->get();
        $following = $user->following()->get();
        return response()->json([
            'success' => true,
            'data' =>
            [
                'followers' => $followers,
                'following' => $following
            ]
        ]);
    }
}
