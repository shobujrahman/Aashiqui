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
// use Kreait\Firebase\Database;

class UserController extends Controller
{

    // public function __construct(Database $database)
    // {
    //     $this->database = $database;
    //     $this->tableName = 'liked';
    // }
    
    
    //getAllUsers
    public function getAllUsers(){
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
 

            return view('user.index', ['users' => $users,
                'userCount' => $userCount,
                'activeCount' => $activeCount,
                'verifyCount' => $verifyCount,
                'unVerifyCount' => $unVerifyCount,
                'premiumCount' => $premiumCount,
                'maleCount' => $maleCount,
                'femaleCount' => $femaleCount,
                
            
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


    public function show($id){
        $user = User::find($id);

        $user->followerCount = $user->followersCount();
        $user->followingCount = $user->followingCount();

        $user->userPhotos = $user->photos()->get();

        $payments = UserPaymentHistory::get();
    
        return view('user.show', ['user' => $user, 'payments' => $payments]);
    }



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
        return redirect()->back()->with('message','updated user type');
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


    //function for firebase

    // public function getAllLikes(){
    //     $users = $this->database->getReference( $this->tableName )->getValue();
    //     // $userList=[];
    //     // foreach ($users as   $user) {
    //     //     if( $user['likedBy'] ==34 ){
    //     //         //if  $user['likedTo'] is already in  $userList continue
    //     //          if( in_array($user['likedTo'], $userList) ){
    //     //               continue;
    //     //          }
    //     //         $userList[] = $user['likedTo'];
    //     //     }
    //     //  }
         
    //     //  return  $userList;
    //     // return $users;
    //      return view('user.userLikes',compact('users'));
    // }
        
}