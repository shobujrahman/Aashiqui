<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use App\Models\UserSubscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function userSubscribe(Request $request)
    {
        $user = auth()->user();

        if ($this->checkIfAlreadySubscribe()) {

            return response()->json([
                'success' => 'false',
                'message' => 'You are already subscribed to package',
                'subscriptionPlan' => $user->currentSubscriptionPlan()->get()
            ], 400);
        }

        $subscriptionPlan = SubscriptionPlan::find($request->subscription_plan_id);
        $planDuration = $subscriptionPlan->durationInMonth;

        $userSubscription = UserSubscription::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'subscription_id' =>  $request->subscription_plan_id,
                'sub_start_date' => now(),
                'sub_end_date' => now()->addMonths($planDuration),
            ]
        );


        return response()->json([
            'message' => 'Subscription Successfully',
            'status' => 'success',
        ]);
    }

    public function checkCurrentSubscription()
    {
        //get sub UserSubscription where sub_end_date is greater than today where user_id is auth user id
        $subscription = UserSubscription::with('subscriptionPlan')->where('user_id', auth()->user()->id)
            ->where('sub_end_date', '>', now())
            ->first();
        if ($subscription) {
            return response()->json([
                'message' => 'Subscription Successfully',
                'status' => 'success',
                'data' => $subscription,
            ]);
        } else {
            return response()->json([
                'message' => 'No Subscription',
                'status' => 'error',
            ]);
        }
    }

    public function checkIfAlreadySubscribe()
    {

        $availableSubscription = UserSubscription::with('subscriptionPlan')
            ->where('user_id', auth()->user()->id)
            ->where('sub_end_date', '>', now())
            ->first();


        if ($availableSubscription) {
            return true;
        }

        return false;
    }
}
