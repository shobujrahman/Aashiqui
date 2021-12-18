<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LiveStreamController extends Controller
{
    //get allLiveStream
    public function allLiveStream()
    {
        Session::put('page','liveStream');
        return view('liveStream.index');
    }
}