<?php

namespace App\Http\Controllers;

use App\Models\UserPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserPhotosController extends Controller
{
    //get all user_photos
    public function allUsersPhotos()
    {   
       Session::put('page','gallery');
        $user_photos = UserPhoto::with(['user'=>function($query){
            $query->select('users.id','users.name','users.profile_pic');
        }])->orderBy('id','desc')->get();
        // return $user_photos;
        return view('gallery.gallery', compact('user_photos'));
    }
}