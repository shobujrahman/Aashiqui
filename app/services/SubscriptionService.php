<?php

namespace App\services;

use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Validator;

class SubscriptionService
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function checkUserSubscription()
    {

        $availableSubscription = UserSubscription::with('subscriptionPlan')
            ->where('user_id', $this->user->id)
            ->where('sub_end_date', '>', now())
            ->first();
        return $availableSubscription;
    }
}
