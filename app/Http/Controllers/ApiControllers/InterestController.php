<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InterestController extends Controller
{
    public function getInterestList()
    {
        $interests = Interest::all();
        return response()->json([
            'status' => 'success',
            'data' => $interests
        ]);
    }





    public function usersWithCommonInterests()
    {
        //get users interest


        $user = auth()->user();
        $interests = $user->interests()->get();
        //get users with common interest
        $users = User::whereHas('interests', function ($query) use ($interests) {
            $query->whereIn('interests.id', $interests->pluck('id'));
        })
            ->where('gender',  auth()->user()->preferedGenderSearch)
            ->where('id', '!=', $user->id)
            ->with('profilePics')
            ->get();

        return response()->json([
            'success' => true,
            'userid' => $user->id,
            'data' => $users,
        ]);
    }
}
