<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserBlock;
// use App\Models\UserLike;
use App\Models\UserPaymentHistory;
// use App\Models\UserPhoto;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\services\FirebaseService;
use Kreait\Firebase\Database;

class UserController extends Controller
{    
    //getAllUsers
    public function getAllUsers(){
        Session::put('page','user');
        $users = User::with(['userSubscription'])->where('isAdminGenerated','=',0)->orderby('id','desc')->get()->toArray();

               
            foreach($users as $key=>$user){
                if($user['user_subscription'] !=null  ){
                $users[$key]['isSubscribed']=$user['user_subscription']['sub_end_date'] >now()
                ? 1:0;
                }
                else{
                $users[$key]['isSubscribed']=0;
                }
            }


            $userCount = User::where('isAdminGenerated','=',0)->count();
            $fakeUserCount = User::where('isAdminGenerated','=',1)->count();
            $activeCount = User::where('last_active','>=',now())->count();
            $verifyCount = User::where('isVerified',1)->count();
            $unVerifyCount = User::where('isVerified',0)->count();
            $premiumCount = UserSubscription::where('sub_end_date','>',now())->count();

            $maleCount = User::where('gender','male')->count();
            $femaleCount = User::where('gender','female')->count();
 

            return view('user.index', ['users' => $users,
                'userCount' => $userCount,
                'activeCount' => $activeCount,
                'verifyCount' => $verifyCount,
                'unVerifyCount' => $unVerifyCount,
                'premiumCount' => $premiumCount,
                'maleCount' => $maleCount,
                'femaleCount' => $femaleCount,
                'fakeUserCount' => $fakeUserCount,
                
            
            ])->with('no',1);
    }

    public function edit($id){
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }


    public function update(Request $request)
    {
        $user = User::find($request->id);
        //if request has passion list input then update passion list
        if ($request->has('interest_list')) {
            // return $request->interest_list;
            $user->interests()->attach($request->interest_list);
        }

        //update the remaining user details
        $user->update(request()->only('name', 'aboutMe', 'jobTitle', 'company', 'school', 'city', 'gender'));
        // return redirect()->back();
        if($user){
            $notification=array(
                'message'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect('/user')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function show(Database $firebaseDb,$id){
        $user = User::with('blockedUsers')->find($id);
        //get all blockd users of this id
        // $blockUsers = UserBlock::where('blockerId',$id)->get();
        
        // return $user;

        $user->followerCount = $user->followersCount();
        $user->followingCount = $user->followingCount();

        $user->userPhotos = $user->photos()->get();
        
        // $user->blockedUsers = $user->blockedUsers()->get();
        
        $photos= $user->userphotos = $user->photos()->count();
       

        $payments = UserPaymentHistory::get();

        $firebaseservice = new FirebaseService();
        
        $IdOfUsersWholikedMe = $firebaseservice->usersWhoLikedMe($firebaseDb, $user->id, 'liked');
        $IdOfUsersIliked = $firebaseservice->usersILiked($firebaseDb, $user->id, 'liked');
        $myMatchedUser = $firebaseservice->matchList($firebaseDb, $user->id, 'matched');
        //matchcount
        $matchUsers = User::whereIn('id', $myMatchedUser)->count();
        //user who liked me count        
        $usersWhoLikedMe = User::whereIn('id', $IdOfUsersWholikedMe)->whereNotIn('id', $myMatchedUser)->count();

        //user i liked count
        $usersIliked = User::whereIn('id', $IdOfUsersIliked)->whereNotIn('id', $myMatchedUser)->count();
        // return $usersIliked;
        
        
        return view('user.show', ['user' => $user,'photos' => $photos,'usersIliked' => $usersIliked,'usersWhoLikedMe' => $usersWhoLikedMe, 'matchUsers' => $matchUsers,'payments' => $payments,])->with('no',1);
    }


//verify Users
    public function updateVerify($id){
        $verify = DB::table('users')
        ->select('isVerified')
        ->where('id', '=', $id)
        ->first();

        //check user Status
        if($verify->isVerified=='1'){
            $status = '0';
        }else{
            $status = '1';
        }

        //update user status
        $values = array('isVerified'=>$status);
        DB::table('users')->where('id',$id)->update($values);
        return redirect()->back()->with('message','Verification updated');
    }
//Block unblock Users
    public function updateBlock($id){
        $block = DB::table('users')
        ->select('isBlocked')
        ->where('id', '=', $id)
        ->first();

        //check user Status
        if($block->isBlocked=='1'){
            $status = '0';
        }else{
            $status = '1';
        }

        //update user block status
        $values = array('isBlocked'=>$status);
        DB::table('users')->where('id',$id)->update($values);
        return redirect()->back()->with('message','Block Status updated');
    }

//view male user
    public function maleUser(){
        Session::put('page','user');
        $femaleCount = User::where('gender','female')->count();
        $users = User::where('gender','male')->orderBy('id','desc')->get();
        return view('user.maleUser',['femaleCount'=>$femaleCount,'users'=>$users])->with('no',1);
    }

//view female user
    public function femaleUser(){
        
        $maleCount = User::where('gender','male')->count();
        $users = User::where('gender','female')->orderBy('id','desc')->get();
        return view('user.femaleUser',['maleCount'=>$maleCount,'users'=>$users])->with('no',1);
    }

    //delete user
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('message','deleted user');
    }

        
}