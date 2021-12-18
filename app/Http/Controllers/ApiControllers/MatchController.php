<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLike;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use App\services\FirebaseService;
class MatchController extends Controller
{
    public function likeUser(Request $request)
    {

        //check if the other user liked me before
        $isLiked = UserLike::where('liker', $request->uid)->where('liked', auth()->user()->id)->first();
        if ($isLiked) {
            $isLiked->isMatched = 1;
            $isLiked->save();
            //send notification to both user about match (todo)
            return 'its a match';
        } else {

            UserLike::create([
                'liker' => auth()->id(),
                'liked' =>  $request->uid,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'You have liked ' . $request->uid . ' successfully'
            ]);
        }
    }



    public function userLikeList()
    {
        $isLiked = UserLike::where('liked', auth()->user()->id)
            ->where('isMatched', 0)
            ->pluck('liker')
            ->toArray();

        $users = User::with('profilePics')->whereIn('id', $isLiked)->get();

        return $users;
    }
    
    public function getUserMatchList(Database $firebaseDb)
    {
       $user = auth()->user();
       
        //$user=User::find(83);
        $firebaseservice = new FirebaseService();

        $myMatchedUser = $firebaseservice->matchList($firebaseDb, $user->id, 'matched');

        $users = User::whereIn('id', $myMatchedUser)->get();

        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }
}
