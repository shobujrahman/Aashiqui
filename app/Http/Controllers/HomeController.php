<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\UserLike;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::put('page', 'dashoard');
        $userCount = User::where('isAdminGenerated','=',0)->count();
        $fakeUserCount = User::where('isAdminGenerated','=',1)->count();
        $maleCount = User::where('gender','male')->count();
        $femaleCount = User::where('gender','female')->count();
        $verifyCount = User::where('isVerified',1)->count();
        $unVerifyCount = User::where('isVerified',0)->count();
        $activeCount = User::where('last_active','>=',now())->count();
        $likeCount = UserLike::count();
        $subscriptionCount = UserSubscription::count();
        $matchCount = UserLike::where('isMatched',1)->count();
        // return $subscriptionCount;
        
        $subscription = UserSubscription::where('sub_end_date','>',now())->count();
        $date = Carbon::now()->subDays(7);
        $recentActive = User::where('last_active', '>', $date)->count();
        // return $recentActive;


        
        return view('home',
            compact('fakeUserCount','unVerifyCount','subscriptionCount','matchCount','userCount','maleCount','femaleCount','verifyCount','subscription','activeCount','recentActive','likeCount'));
        
    }

    //count all users where sub_end_date greater than now

        
    
}