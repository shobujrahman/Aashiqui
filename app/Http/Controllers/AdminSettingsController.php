<?php

namespace App\Http\Controllers;

use App\Models\AdminSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminSettingsController extends Controller
{
    //get all Settings
    public function settings()
    {
        Session::put('page','settings');
        $settings = AdminSetting::first();
        return view('adminSetting.index', compact('settings'))->with('no', 1);
    }

    public function update(Request $request){
        $settings = AdminSetting::first();

        $settings->fcm_server_key = $request->fcm_server_key;
        $settings->about_us = $request->about_us;

        $settings->privacy_policy = $request->privacy_policy;
        
        $settings->update();

        if($settings)
        {
            $notification=array(
                'message'=>'Successfully updated',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        else
        {
            $notification=array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
       
        // return redirect()->back()->with('message', 'Settings Updated!');
    }
}