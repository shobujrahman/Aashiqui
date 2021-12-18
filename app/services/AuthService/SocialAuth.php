<?php

namespace App\services\AuthService;

use App\Models\User;
use App\Models\UserSubscription;
use App\services\SubscriptionService;
use Laravel\Socialite\Facades\Socialite;

class SocialAuth
{
    public function login(string $provider_name, string $access_token)
    {

        $providerUser = Socialite::driver($provider_name)->userFromToken($access_token);

        $dbUser = User::where('provider_id', $providerUser->id)->first();

        if ($dbUser == null) {
            $user = new User();
            $user->authProvider = $provider_name;
            $user->provider_id = $providerUser->id;
            $user->name = $providerUser->getName();
            $user->email = $providerUser->getEmail();
            $user->save();
            $user = User::find($user->id);
             
            $apiToken = $user->createToken('app_token')->plainTextToken;
            return [
                'success' => true,
                'server_token' => $apiToken,
                'message' => 'login successful',
                'user' => $user,
                'subscription' => null
            ];
        } else {
            $userSubscription = new SubscriptionService($dbUser);
            $availableSubscription = $userSubscription->checkUserSubscription();
            $apiToken = $dbUser->createToken('app_token')->plainTextToken;

            return [
                'success' => true,
                'apiToken' => $apiToken,
                'message' => 'login successful',
                'user' => $dbUser,
                'subscription' => $availableSubscription
            ];
        }
    }
}

