<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\services\Blocking;
use App\services\FirebaseService;
use Kreait\Firebase\Database;

class SwipePageController extends Controller
{
    protected  $distance;

    public function __construct()
    {
        $this->distance = 3000;
    }

    public function getSwipePageUsers(Database $firebaseDb)
    {
        //find users from nearby location
        $users = $this->getNearByUser($this->distance, $firebaseDb);
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }


    public function getNearByUser($distance, $firebaseDb)
    {
        $user = auth()->user();
        // return $user;
        $latitude = deg2rad($user->latitude);
        $longitude = deg2rad($user->longitude);


        $userBlock = new Blocking($user);
        $blockListId = $userBlock->getBlockedList();

        $swipeLimit = 200;

        // $boostedUsers = User::with(['userPhotoLastThree', 'interests'])->where('isBoosted', 1)
        //  ->where('id', '!=', auth()->id())

        //   ->when($user->preferedGenderSearch == 'male', function ($query) {
        //    $query->where('gender', 'male');
        //  })
        //  ->when($user->preferedGenderSearch == 'female', function ($query) {
        //      $query->where('gender', 'female');
        //  })
        //  ->where('boostedEndDate', '>', now())
        //   ->whereNotIn('id', $blockListId)
        //  ->get();


        //already liked user from firebase like table
        $firebaseHelper = new FirebaseService();

        $alreadyLikedAndUnlikedUser = $firebaseHelper->getLikedUnlikedUser($firebaseDb, $user->id, 'liked');

        //followingUser
        $followinguserIds = $user->following()->get()->pluck('following_id')->toArray();

        $users = User::with(['userPhotoLastThree', 'interests'])
            ->where('id', '!=', auth()->id())
            // ->where('gender',$user->preferedGenderSearch)	
            //   ->when($user->preferedGenderSearch == 'male', function ($query) {
            //    $query->where('gender', 'male');
            //  })
            // ->when($user->preferedGenderSearch == 'female', function ($query) {
            //    $query->where('gender', 'female');
            //})
            ->whereRaw("acos(sin($latitude) * sin(radians(latitude))
         + cos($latitude) * cos(radians(latitude)) * cos(radians(longitude)
          - ($longitude))) * 6371 <= $distance")
            ->whereNotIn('id', $blockListId)
            ->whereNotIn('id', $alreadyLikedAndUnlikedUser)
            ->whereNotIn('id', $followinguserIds)
            ->where('isBlocked', 0)
            ->where('visibleOnApp', 1)
            ->inRandomOrder()
            ->limit($swipeLimit)
            ->get();

        //get fake users
        $fakeUsers = User::where('isAdminGenerated', 1)->with(['userPhotoLastThree', 'interests'])
            ->get();

        //merge users and boosted users
        //$nearByUser = $user->merge($boostedUsers)->shuffle();

        //merge fake user in user 
        $nearByUser = $users->merge($fakeUsers)->shuffle();

        $authUserInterests = $user->interests()->get()->pluck('id')->toArray();

        foreach ($nearByUser as $u) {

            foreach ($u->interests as $interest) {
                $interest->isCommon = in_array($interest->id, $authUserInterests) ? true : false;
            }
        }



        return $nearByUser;
    }
}
