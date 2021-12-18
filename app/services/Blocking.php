<?php

namespace App\services;

use App\Models\User;
use App\Models\UserBlock;
use Illuminate\Support\Facades\Validator;

class Blocking
{

    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public static function getBlockedList()
    {
        $user = auth()->user();
        //get blocked users
        $userBlockedByme = UserBlock::where('blockerId', $user->id)
            ->pluck('blockedId')->toArray();

        //get user who has blocked me
        $userBlockedMe = UserBlock::where('blockedId', $user->id)
            ->pluck('blockerId')->toArray();

        $excludedUsers = array_merge($userBlockedByme, $userBlockedMe);

        return $excludedUsers;
    }
}
