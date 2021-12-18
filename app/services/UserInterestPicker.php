<?php

namespace App\services;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserInterestPicker
{

    public static function pickUserInterests(array $interestList, $userId)
    {

        $user = User::find($userId);
        $user->interests()->attach($interestList);

        return true;
    }
}
