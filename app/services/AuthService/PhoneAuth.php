<?php

namespace App\services\AuthService;

use App\Models\User;
use App\Models\UserSubscription;
use App\services\SubscriptionService;
use Laravel\Socialite\Facades\Socialite;

class PhoneAuth
{

    public static function checkIfUserWithNumberExist($phone)
    {
        $user = User::where('contactNo', $phone)->first();
        if ($user) {
        $user->fcm_device_token='eeeeeeeeee';
        $user->save();
            return ['success' => true, 'user' => $user,
            'apiToken' => $user->createToken('app_token')->plainTextToken
            
            ];
        }
        return ['success' => false, 'user' => $user];
    }
    
    
    
    
    public static function createUser($phone)
    {
     $user = User::where('contactNo', $phone)->first();
        if ($user) {
            return ['success' => true,'message'=>'user already exist', 'user' => $user,
             'apiToken' => $user->createToken('app_token')->plainTextToken
            ];
        }
        $user = new User();
        $user->contactNo = $phone;
         $user->authProvider = 'phone';
         
   
        
        $user->save();
         $user = User::find($user->id);
         $apiToken = $user->createToken('app_token')->plainTextToken;
        return ['success' => true, 'user' => $user,'apiToken' =>  $apiToken ];
    }
}
