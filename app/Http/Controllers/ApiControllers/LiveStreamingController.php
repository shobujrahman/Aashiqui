<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\FakeUserLiveStreaming;
use App\Models\User;
use App\services\FirebaseService;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;


class LiveStreamingController extends Controller
{
    public function liveStreamings(Database $firebaseDb)
    {

        $firebaseservice = new FirebaseService();

        $dbUsers = $firebaseservice->livestreamingUser($firebaseDb, 'livedb');

        $agoraTokens = $dbUsers['usersAgoraToken'];
        $channelNames = $dbUsers['usersChanelName'];

        // extract the key from dbUsers array
        $liveUserIds = array_keys($agoraTokens);

        $users = User::whereIn('id', $liveUserIds)
            ->get()->map(function ($user) use ($agoraTokens, $channelNames) {
                $user->agoraToken = $agoraTokens[$user->id];
                $user->channelName = $channelNames[$user->id];
                $user->fakeVideos = null;

                return $user;
            });

        $fakeUserStreanings = User::where('isAdminGenerated', 1)
            ->whereHas('fakeVideos')
            ->with('fakeVideos')
            ->get()->map(function ($user) {
                $user->agoraToken = null;
                $user->channelName = null;
                return $user;
            });

        $users = $users->merge($fakeUserStreanings);



        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }

    public function getAllFakeStream()
    {
        $fakeUsersStream = FakeUserLiveStreaming::with(['user' => function ($query) {
            $query->select('id', 'name', 'profile_pic');
        }])->get();
        return response()->json([
            'success' => true,

            'data' =>  $fakeUsersStream,
        ]);
    }


    public function getFakeComments()
    {
        $fakeComments = Comment::all();
        return response()->json([
            'success' => true,
            'data' =>  $fakeComments,
        ]);
    }
}
