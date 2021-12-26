<?php

namespace App\Http\Controllers;

use App\Models\FakeUserLiveStreaming;
use App\Models\Interest;
use App\Models\User;
use App\Models\UserLike;
use App\Models\UserPaymentHistory;
use App\Models\UserPhoto;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FakeUserController extends Controller
{
    public function fakeUsersList(){
        Session::put('page','user');
        $users = User::with(['userSubscription'])->where('isAdminGenerated','=',1)->orderby('id','desc')->get()->toArray();

               
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

            return view('fakeUser.index', ['users' => $users,
            'userCount' => $userCount,
            'activeCount' => $activeCount,
            'verifyCount' => $verifyCount,
            'unVerifyCount' => $unVerifyCount,
            'premiumCount' => $premiumCount,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'fakeUserCount' => $fakeUserCount,
                
            
            ])->with('no',1);
        // return view('fakeUser.index');
    }

    //createFakeUser
    public function create(){
        $interests = Interest::all();
        return view('fakeUser.create', compact('interests'));
    }

    //get stored
    public function store(Request $request){

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->contactNo = $request->contactNo;
        $user->school = $request->school;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->isAdminGenerated = 1 ;

        $user->save();


//userPhotos
        $imageArray = $request->imageUrl;
        $s3 = Storage::disk('do_spaces');
       for ($i = 0; $i < count($imageArray); $i++) {
            $file = $imageArray[$i];
            $fileName = $file->getClientOriginalName();
            $path = $s3->putFileAs('Asiquee/userPhotos', $file, $fileName, 'public');
            $user->userPhoto()->create(['imageUrl' => $path]);
        }
        
        //get first image path of userPhotos
        $user->profile_pic = $user->userPhoto()->get()->last()->imageUrl;
        $user->save();

//interest store
        $interestList=$request->interestId;

        foreach ($interestList as $interestId) {
            $interestArray[]=(int)  $interestId;
       }
       $user->interests()->sync($interestArray);

       
//fakeUser StreamVideo Upload
       $s3 = Storage::disk('do_spaces');
            $file = $request->file('live_stream_url');
            $fileName = $file->getClientOriginalName();

           
            $path = $s3->putFileAs('Asiquee/FakeUserStream', $file, $fileName, 'public');

       FakeUserLiveStreaming::create([
        'user_id' => $user->id,
        // 'live_stream_url' => $request->live_stream_url,
        'live_stream_url' => $user->live_stream_url= $path,

        
            
    ]);

    
    // $user->FakeUserLiveStreaming()->create(['live_stream_url' => $request->live_stream_url]);


        if($user)
                {
                    $notification=array(
                        'message'=>'Successfully added',
                        'alert-type'=>'success'
                    );
                    return redirect('/fakeUsers')->with($notification);
                }
                else
                {
                    $notification=array(
                        'message'=>'Something went wrong',
                        'alert-type'=>'error'
                    );
                    return redirect()->back()->with($notification);
                }
       
    }
}