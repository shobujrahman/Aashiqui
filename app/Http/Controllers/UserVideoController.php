<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVideo;
use Illuminate\Http\Request;

class UserVideoController extends Controller
{
    public function allUsersVideo()
    {
        $usersVideos = UserVideo::all();
        return view('userVideo.index', compact('usersVideos'))->with('no', 1);
    }

    //get create function
    public function create()
    {
        $users=User::all();
        return view('userVideo.create',compact('users'));
    }

    

    
}