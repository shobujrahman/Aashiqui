<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function activeTime()
    {
        $user = auth()->user();
        $user->last_active = now();
        $user->save();
        return response()->json(['success' => true]);
    }

     public function userExplore()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'recentlyActiveUser' => $this->getRecentlyActiveUser(),
                'commonInterestUser' => $this->commonInterestUsers(),
                'recomendedUser' => $this->recomendedUsers()

            ]
        ]);
    }
    
     public function getRecentlyActiveUser()
    {


        $recentActiveUser = User::where('created_at', '>', now()->subWeeks(1))
            ->where('gender',  auth()->user()->preferedGenderSearch)
            ->get(['id', 'name', 'profile_pic','birthdate'])
            ->shuffle()
            ->take(20);

        return $recentActiveUser;
    }

    public function commonInterestUsers()
    {
        $user = auth()->user();
        $interests = $user->interests()->get();
        //get users with common interest
        $userWithCommonInterests = User::whereHas('interests', function ($query) use ($interests) {
            $query->whereIn('interests.id', $interests->pluck('id'));
        })
          ->where('gender',  auth()->user()->preferedGenderSearch)
            ->where('id', '!=', $user->id)
            ->get(['id','name','profile_pic','birthdate'])
            ->shuffle()
            ->take(20);

        return $userWithCommonInterests;
    }

    public function recomendedUsers()
    {
        $user = auth()->user();
        $recomendedUsers = User::where('gender',  auth()->user()->preferedGenderSearch)
            ->get(['id', 'name', 'profile_pic','birthdate'])
            ->shuffle()
            ->take(20);
        return  $recomendedUsers;
    }
}
