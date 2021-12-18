<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class LikedPageController extends Controller
{


    public function usersWhoLikedMe(Database $firebaseDb)
    {
        $user = auth()->user();
        
        // $user=User::find(83);
        $firebaseservice = new FirebaseService();

        $IdOfUsersWholikedMe = $firebaseservice->usersWhoLikedMe($firebaseDb, $user->id, 'liked');
        $myMatchedUser = $firebaseservice->matchList($firebaseDb, $user->id, 'matched');
        
        
        $users = User::whereIn('id', $IdOfUsersWholikedMe)
        ->whereNotIn('id', $myMatchedUser)
        ->get();

        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }



 public function usersIliked(Database $firebaseDb)
    {
      $user = auth()->user();
      // $user = User::find(105);
        
    
        $firebaseservice = new FirebaseService();

        $IdOfUsersWholikedMe = $firebaseservice->usersILiked($firebaseDb, $user->id, 'liked');
        $myMatchedUser = $firebaseservice->matchList($firebaseDb, $user->id, 'matched');
        
        
        $users = User::whereIn('id', $IdOfUsersWholikedMe)
         
        ->get();

        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }

 public function liveStreamingUser(Database $firebaseDb)
    {

        $firebaseservice = new FirebaseService();

        $IdOfUsersWholikedMe = $firebaseservice->livestreamingUser($firebaseDb, 'livedb');


        $users = User::whereIn('id', $IdOfUsersWholikedMe)
            ->get();

        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }



    public function liveStreamingUsersDetails($id, Database $firebaseDb)
    {
       $firebaseservice = new FirebaseService();



        $IdOfUsersWholikedMe = $firebaseservice->usersWhoLikedMe($firebaseDb, $id, 'liked');
        $likeCount = count($IdOfUsersWholikedMe);

        $user = User::find($id);
        $user->followingCount = $user->followersCount();
        $user->followerCount = $user->followingCount();
        $user->likedCount = $likeCount;


        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }

}