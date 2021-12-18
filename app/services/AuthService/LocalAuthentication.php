<?php

namespace App\services\AuthService;

use App\Models\User;
use App\services\UserInterestPicker;
use App\services\SubscriptionService;
class LocalAuthentication
{

    public function register(
        $email,
        $password,
        $confirmPassword,
        $phone,
        $name
        

    ) {
        //check if user already exist
        $user = User::where('email', $email)->first();
        if ($user) {
            return [
                'success' => false,
                'message' => 'User already exist'
            ];
        }

        //check if password and confirm password match
        if ($password !== $confirmPassword) {
            return [
                'success' => false,
                'message' => 'Password and confirm password do not match'
            ];
        }

        //create user
        $user = new User();
        $user->name = $name;
        $user->email = $email;
       $user->password = bcrypt($password);
        $user->contactNo = $phone;
        $user->authProvider = 'local';
       
 

        $saved = $user->save();
       $user = User::where('email', $email)->first();
      
       
        //create token for user
        $apiToken = $user->createToken('app_token')->plainTextToken;

        return [
            'success' => true,
            'user' => $user,
            'apiToken' => $apiToken
        ];
    }

    public function login(string $email, string $password)
    {
        //check if user exist
        $user = User::where('email', $email)->first();
        //check if user exist
        $user = User::where('email', $email)->first();
        if ($user == null) {
            return [
                'success' => false,
                'message' => 'User does not exist'
            ];
        }

        //check if password match
        if (!password_verify($password, $user->password)) {
            return [
                'success' => false,
                'message' => 'Password is incorrect'
            ];
        }
         //user interest
         $user->interests=$user->interests()->get();
        $userSubscription = new SubscriptionService($user);
        $availableSubscription = $userSubscription->checkUserSubscription();
        return [
            'success' => true,
            'user' => $user,
            //'interests'=>$user->interests()->get(),
            'apiToken' => $user->createToken('app_token')->plainTextToken,
              'availableSubscription' => $availableSubscription
        ];
    }
}
