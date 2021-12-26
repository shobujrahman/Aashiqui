<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserProfileController extends Controller
{


  public function userProfile()
    {
        $user = auth()->user();
        $user->interests = $user->interests()->get();
        $user->photos = $user->userPhoto()->get();
        $user->lastThreePhotos = $user->userPhotoLastThree()->get();
        $user->followings = $user->followers()->get();
        $user->followers = $user->following()->get();

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
    
    public function updateUserDetails(Request $request)
    {
        $user = auth()->user();

        //if request has passion list input then update passion list
        if ($request->has('interest_list')) {
            // return $request->interest_list;
            $user->interests()->attach($request->interest_list);
        }

        //update the remaining user details
        $user->update(request()->only('name', 'aboutMe', 'jobTitle', 'company', 'school', 'city', 'gender','age'));
        
         $user->interests=$user->interests()->get();

        return response()->json([
             'success' => true,
            'message' => 'User details updated successfully!',
            'data'=>$user
            
            
        ]);
    }

    public function uploadProfilePic(Request $request)
    {
        $user = auth()->user();
       
        $s3 = Storage::disk('do_spaces');
        $file = $request->file('profilePic');
        
        $fileName = $file->getClientOriginalName();
        
        if ($user->profilePic != null) {
            $s3->delete($user->profilePic);
            $path = $s3->putFileAs('Asiquee/profilePic', $file, $fileName, 'public');
            $user->update(['profile_pic' => $path]);
        } else {
            $path = $s3->putFileAs('Asiquee/profilePic', $file, $fileName, 'public');
            $user->profile_pic= $path;
            $user->save();
        }

        return response()->json(
            [
                'success' => 'true',
                'message' => 'Profile pic uploaded successfully!',
                'imagePath' => $path
            ]
        );
    }
    
     public function uploadUserPhotos(Request $request)
    {

        $imageArray = $request->imagePhotos;
      // \Log::info($request);
     
        $user = auth()->user();
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
        
        return response()->json(
            [
                'success' => true,
                'message' => 'Photos uploaded successfully!',
                'user'=>auth()->user()
            ]
        );
    }
}