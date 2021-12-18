<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\services\UserInterestPicker;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserSettingController extends Controller
{
    public function changeUserLocation(Request $request)
    { //make validation
        $validation = Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',

        ]);
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->first()
            ]);
        }
        $user = auth()->user();
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'Location updated successfully',
            'user' => auth()->user()

        ]);
    }

    public function changeContactNumber(Request $request)
    {
        $user = auth()->user();
        $user->contactNo = $request->contactNo;
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Contact number updated successfully'
        ]);
    }

    public function visibleOnApp()
    {
        $user = auth()->user();
        $user->visibleOnApp = !$user->visibleOnApp;
        $user->save();
        return response()->json([
            'status' => 'success',
            'data' => $user->visibleOnApp
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();
        //check if the old password match with new password
        if (Hash::check($request->oldPassword, $user->password)) {
            $user->password = bcrypt($request->newPassword);
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Password updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Old password does not match'
            ]);
        }
    }

    public function changeFacebookLink(Request $request)
    {
        $user = auth()->user();
        $user->facebookId = $request->facebookId;
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Facebook link updated successfully'
        ]);
    }
    public function changeInstagramLink(Request $request)
    {
        $user = auth()->user();
        $user->instagramId = $request->instagramId;
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Instagram link updated successfully'
        ]);
    }

    public function selectGender(Request $request)
    {

        //make validation
        $validation = Validator::make($request->all(), [
            'gender' => 'required|in:male,female',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->first(),
                'user' => auth()->user()

            ]);
        }
        $user = auth()->user();
        $user->gender = $request->gender;
        if ($request->gender === 'male') {
            $user->preferedGenderSearch = 'female';
        } else if ($request->gender === 'female') {
            $user->preferedGenderSearch = 'male';
        }
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'Gender updated successfully'
        ]);
    }

    public function changePreferedGenderSearch(Request $request)
    {
        $user = auth()->user();
        $user->preferedGenderSearch = $request->preferedGenderSearch;
        $user->save();
        return response()->json([
            'status' => 'success',
            'data' => $user->preferedGenderSearch
        ]);
    }
    public function selectInterest(Request $request)
    {

        \Log::info($request);
        $validator = Validator::make($request->all(), [
            'interestsList' => 'required|array',
            'interestsList.*' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }
        $user = auth()->user();
        $user->interests()->attach($request->interestsList);


        return response()->json([
            'success' => true,
            'message' => 'interest added successfully'
        ]);
    }

    public function setbirthdate(Request $request)
    {
        $user = auth()->user();
        $user->birthdate = $request->birthdate;
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'birthdate updated successfully',
            'user' => auth()->user()
        ]);
    }

    public function changename(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'name updated successfully',
            'user' => auth()->user()
        ]);
    }

    public function updateActiveStatus()
    {
        $user = auth()->user();
        $user->last_active = now();
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'status updated successfully'
        ]);
    }

    public function setEmail(Request $request)
    {
        $user = auth()->user();
        $user->email = $request->email;
        $user->save();
        $user = User::find($user->id);
        return response()->json([
            'success' => true,
            'message' => 'Email updated successfully',
            'user' => $user

        ]);
    }

    public function setSchool(Request $request)
    {
        $user = auth()->user();
        $user->school = $request->school;
        $user->save();
        $user = User::find($user->id);
        return response()->json([
            'success' => true,
            'message' => 'school updated successfully',
            'user' => $user
        ]);
    }

    public function setFcmDeviceToken(Request $request)
    {
        $user = auth()->user();
        $user->fcm_device_token = $request->fcm_device_token;
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'fcm device token updated successfully'
        ]);
    }

    public function updateInterests(Request $request)
    {
        $user = auth()->user();
        //deteach all interests from user
        $user->interests()->detach();

        $user->interests()->sync($request->interestsList);

         return response()->json([
            'success' => true,
            'message' => ' updated successfully'
        ]);
    }

    public function storeFcmToken(Request $request)
    {
        $user = auth()->user();
        $user->fcm_device_token = $request->fcm_device_token;
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'fcm token updated successfully'
        ]);
    }
    
      public function getUserFcmToken($uid)
    {
       $user =  User::find($uid);
        return response()->json([
            'success' => true,
            'message' => 'fcm token updated successfully',
            'fcm_device_token' => $user->fcm_device_token
        ]);
    }
}
