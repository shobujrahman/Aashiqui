<?php

namespace App\services;

use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\Validator;

class FirebaseService
{

    // public function __construct()
    // {
    // }

    public function getLikedUnlikedUser($db, $appUserId, $tableName)
    {
        // return $appUserId;
        $firebaseLikedArray = $db->getReference($tableName)->getValue();
        $likedAndUnlikedUserList = [];

        if ($firebaseLikedArray) {
            foreach ($firebaseLikedArray as $item) {
                if ($item['myid'] == $appUserId  && $item['tag'] == 'liked') {

                    $likedAndUnlikedUserList[] = $item['likeduserid'];
                }
            }
        }

        return  $likedAndUnlikedUserList;
    }

    public function usersWhoLikedMe($db, $appUserId, $tableName)
    {
        $firebaseLikedArray = $db->getReference($tableName)->getValue();
        $userLikedMe = [];
        if ($firebaseLikedArray) {
            foreach ($firebaseLikedArray as $item) {
                if ($item['likeduserid'] == $appUserId && $item['tag'] == 'liked') {

                    $userLikedMe[] = $item['myid'];
                }
            }
        }

        return  $userLikedMe;
    }


    public function usersILiked($db, $appUserId, $tableName)
    {
        $firebaseLikedArray = $db->getReference($tableName)->getValue();
        $userLikedMe = [];
        if ($firebaseLikedArray) {
            foreach ($firebaseLikedArray as $item) {
                if ($item['myid'] == $appUserId  && $item['tag'] == 'liked') {

                    $userLikedMe[] = $item['likeduserid'];
                }
            }
        }

        return  $userLikedMe;
    }


    public function matchList($db, $appUserId, $tableName)
    {

        $firebaseLikedArray = $db->getReference($tableName)->getValue();
        $matchList = [];

        if ($firebaseLikedArray) {
            foreach ($firebaseLikedArray as $item) {
                if ($item['myid'] == $appUserId  && $item['tag'] == 'matched') {

                    $matchList[] = $item['likeduserid'];
                } elseif ($item['likeduserid'] == $appUserId) {

                    $matchList[] = $item['myid'];
                }
            }
        }

        return  $matchList;
    }

    public function livestreamingUser($db, $tableName)
    {

        $firebaseLikedArray = $db->getReference($tableName)->getValue();
        $liveusers = [];

        if ($firebaseLikedArray) {
            foreach ($firebaseLikedArray as $item) {

                $liveusers[] = $item['userid'];
            }
        }

        return  $liveusers;
    }
}