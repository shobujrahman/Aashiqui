<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PersonDetailsController extends Controller
{
    public function PersonDetails($pid)
    {
	

       $authUserId = auth()->user()->id;
       $authUser=auth()->user();
       // return $authUserId ;
        $user = User::find($pid);
        $user->followers=$user->followers()->get();
        $user->folliwing=$user->following()->get();
        
        $user->interests = $user->interests()->get() ? $user->interests()->get() : [];
        $user->photos = $user->userPhoto()->get();
        $user->userPhotoLastThree = $user->userPhotoLastThree()->get();

 
      $user->isFollowing = $authUser->isFollowing($pid) ? 1 : 0;
    	
    
    
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
}

