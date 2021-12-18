<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerificationController extends Controller
{
    public function verifiedUsers(){
        Session::put('page', 'verifications');
        // $verifyCount = User::where('isVerified',1)->count();
        $unVerifyCount = User::where('isVerified',0)->count();
        $users = User::where('isVerified',1)->orderBy('id','desc')->get();
        return view('verification.index',['unVerifyCount'=>$unVerifyCount,'users'=>$users])->with('no',1);
    }
    public function unVerifiedUser(){
        Session::put('page', 'verifications');
        $verifyCount = User::where('isVerified',1)->count();
        // $unVerifyCount = User::where('isVerified',0)->count();
        $users = User::where('isVerified',0)->orderBy('id','desc')->get();
        return view('verification.unVerificationUser',['verifyCount'=>$verifyCount,'users'=>$users])->with('no',1);
    }
}