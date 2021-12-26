<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\FakeUserLiveStreaming;
use App\Models\User;
use Illuminate\Http\Request;

class FakeUsersStreamingController extends Controller
{
    //get all FakeUsersStream
    public function getAllFakeStream()
    {
        $fakeUsersStream = FakeUserLiveStreaming::with(['user'=>function($query){
             $query->select('id','name','profile_pic');
        }])->get();
        return response()->json([
            'success' => true,
         
            'data' =>  $fakeUsersStream,
           ]);


    //     $fakeUsersStream = User::with(['user'=>function($query){
    //          $query->select('id','name','profile_pic');
    //     }])->where('isAdminGenerated')->get();
    //     return response()->json([
    //         'success' => true,
         
    //         'data' =>  $fakeUsersStream,
    //        ]);
    }
}