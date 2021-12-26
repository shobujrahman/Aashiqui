<?php

use App\Http\Controllers\ApiControllers\ActivityController;
use App\Http\Controllers\ApiControllers\AuthController;
use App\Http\Controllers\ApiControllers\InterestController;
use App\Http\Controllers\ApiControllers\MatchController;
use App\Http\Controllers\ApiControllers\SubscriptionController;
use App\Http\Controllers\ApiControllers\SwipePageController;
use App\Http\Controllers\ApiControllers\UserProfileController;
use App\Http\Controllers\ApiControllers\UserSettingController;
use App\Http\Controllers\ApiControllers\PersonDetailsController;
use App\Http\Controllers\ApiControllers\FollowControler;
use App\Http\Controllers\ApiControllers\BlockController;
use App\Http\Controllers\ApiControllers\ReportController;
use App\Http\Controllers\ApiControllers\LikedPageController;
use App\Http\Controllers\ApiControllers\AgoraTokenGeneratorController;
use App\Http\Controllers\ApiControllers\FakeUsersStreamingController;
use App\Http\Controllers\ApiControllers\GiftController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});


Route::post('/localRegister', [AuthController::class, 'localRegister']);
Route::post('/localLogin', [AuthController::class, 'localLogin']);
Route::post('/socialLogin', [AuthController::class, 'socialLogin']);

//route group with middleware
Route::get('/getInterestList', [InterestController::class, 'getInterestList']);


Route::post('/checkUserWIthPhoneExist', [AuthController::class, 'checkUserWithPhone']);

Route::post('/createUserWithPhone', [AuthController::class, 'createUserWIthPhone']);
Route::post('/checkUserWithEmail', [AuthController::class, 'checkIfUserExistwithEmail']);

Route::group(['middleware' => ['auth:api']], function () {

  //select user details
  Route::post('/setGender', [UserSettingController::class, 'selectGender']);
  Route::post('/setPreferedGneder', [UserSettingController::class, 'changePreferedGenderSearch']);
  Route::post('/changeLocation', [UserSettingController::class, 'changeUserLocation']);
  Route::post('/selectInterests', [UserSettingController::class, 'selectInterest']);
  Route::post('/setBirhtday', [UserSettingController::class, 'setbirthdate']);
  Route::post('/changeName', [UserSettingController::class, 'changename']);
  Route::get('/updateActiveStatus', [UserSettingController::class, 'updateActiveStatus']);
  Route::post('/setEmail', [UserSettingController::class, 'setEmail']);
  Route::post('/setSchool', [UserSettingController::class, 'setSchool']);

  //fcm token store
  Route::post('/setFcmDeviceToken', [UserSettingController::class, 'setFcmDeviceToken']);

  //swipe screen
  Route::get('/getNearbyUser', [SwipePageController::class, 'getSwipePageUsers']);

  //pick interests

  Route::post('/pickInterest', [InterestController::class, 'pickUserInterests']);
  Route::get('/userWithCommonInterests', [InterestController::class, 'usersWithCommonInterests']);


  //like user
  Route::post('/likeUser', [MatchController::class, 'likeUser']);
  Route::get('/likeList', [MatchController::class, 'userLikeList']);


  //recently active users
  Route::get('/recentlyActiveUsers', [ActivityController::class, 'getRecentlyActiveUser']);


  //user profile
  Route::get('/userProfile', [UserProfileController::class, 'userProfile']);
  Route::post('/updateProfile', [UserProfileController::class, 'updateUserDetails']);

  //person details
  Route::get('/personProfile/{pid}', [PersonDetailsController::class, 'PersonDetails']);

  //USER EXPLORE
  Route::get('/userExplore', [ActivityController::class, 'userExplore']);


  //FOLLOW SYSTEM
  Route::post('/followAUser', [FollowControler::class, 'followUser']);
  Route::get('/followList', [FollowControler::class, 'followLists']);

  //subscription module
  Route::post('/userSubscribe', [SubscriptionController::class, 'userSubscribe']);
  Route::post('/updateProfilePic', [UserProfileController::class, 'uploadProfilePic']);
  Route::post('/uploadUserPhotos', [UserProfileController::class, 'uploadUserPhotos']);

  //block module
  Route::post('/blockUser', [BlockController::class, 'blockUser']);
  Route::post('/unblockUser', [BlockController::class, 'unblockUser']);
  Route::get('/blockList', [BlockController::class, 'blockList']);

  //REPORT SYSTEM
  Route::post('/reportuser', [ReportController::class, 'reportUser']);


  //match list

  //update interest
  Route::post('/updateInterest', [UserSettingController::class, 'updateInterests']);

  //store fcm token
  Route::post('/storeFcmToken', [UserSettingController::class, 'storeFcmToken']);
  Route::get('/getuserFcmToken/{uid}', [UserSettingController::class, 'getUserFcmToken']);

  //LIKE LIST
  Route::get('/usersLikedMe', [LikedPageController::class, 'usersWhoLikedMe']);
  Route::get('/userIliked', [LikedPageController::class, 'usersIliked']);

  //agora token generator

  //MATCHED USER

  Route::get('/matchList', [MatchController::class, 'getUserMatchList']);
});
Route::get('/liveStreamingusers', [LikedPageController::class, 'liveStreamingUser']);
Route::get('/liveStreamingUsersDetails/{id}', [LikedPageController::class, 'liveStreamingUsersDetails']);


Route::post('/getAgoraToken', [AgoraTokenGeneratorController::class, 'generateToken']);

//fake users streaming
Route::get('/getFakeUsersVideo', [FakeUsersStreamingController::class, 'getAllFakeStream']);

//Gift
Route::get('/getAllGift', [GiftController::class, 'allGift']);