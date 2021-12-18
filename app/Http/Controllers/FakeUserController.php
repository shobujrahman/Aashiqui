<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLike;
use App\Models\UserPaymentHistory;
use App\Models\UserPhoto;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FakeUserController extends Controller
{
    public function fakeUsersList(){
        Session::put('page','user');
        $users = User::with(['userSubscription'])->orderby('id','desc')->get()->toArray();

               
            foreach($users as $key=>$user){
                if($user['user_subscription'] !=null  ){
                $users[$key]['isSubscribed']=$user['user_subscription']['sub_end_date'] >now()
                ? 1:0;
                }
                else{
                $users[$key]['isSubscribed']=0;
                }
            }


            $userCount = User::count();
            $activeCount = User::where('last_active','>=',now())->count();
            $verifyCount = User::where('isVerified',1)->count();
            $unVerifyCount = User::where('isVerified',0)->count();
            $premiumCount = UserSubscription::where('sub_end_date','>',now())->count();

            $maleCount = User::where('gender','male')->count();
            $femaleCount = User::where('gender','female')->count();
 

            return view('fakeUser.index', ['users' => $users,
                'userCount' => $userCount,
                'activeCount' => $activeCount,
                'verifyCount' => $verifyCount,
                'unVerifyCount' => $unVerifyCount,
                'premiumCount' => $premiumCount,
                'maleCount' => $maleCount,
                'femaleCount' => $femaleCount,
                
            
            ])->with('no',1);
        // return view('fakeUser.index');
    }

    //createFakeUser
    public function create(){
        
        return view('fakeUser.create');
    }
}