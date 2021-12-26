<?php

use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FakeUserController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\LiveStreamController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPhotosController;
use App\Http\Controllers\UserReportController;
use App\Http\Controllers\LikedPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () { 
    //home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    //interest
    Route::get('/interest', [InterestController::class, 'getAllInterest'])->name('interest');
    Route::get('/interest/create', [InterestController::class, 'create'])->name('interest.create');
    Route::post('/interest/submit', [InterestController::class, 'store'])->name('interest.submit');
    Route::get('/interest/edit/{id}', [InterestController::class, 'edit'])->name('interest.edit');
    Route::post('/interest/update/{id}', [InterestController::class, 'update'])->name('interest.update');
    Route::get('/interest/delete/{id}', [InterestController::class, 'destroy'])->name('interest.destroy');
    //user
    Route::get('/user', [UserController::class, 'getAllUsers'])->name('user');
    Route::get('/maleUser', [UserController::class, 'maleUser'])->name('user.maleUser');
    Route::get('/femaleUser', [UserController::class, 'femaleUser'])->name('user.femaleUser');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/submit', [UserController::class, 'store'])->name('user.submit');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/update-verify/{id}',  [UserController::class, 'updateVerify'])->name('user.updateVerify');
    Route::get('/user/block/{id}',  [UserController::class, 'updateBlock'])->name('user.updateBlock');
    //subscription
    Route::get('/subscription', [SubscriptionController::class, 'getAllSubscription'])->name('subscription');
    Route::get('/subscription/create', [SubscriptionController::class, 'create'])->name('subscription.create');
    Route::post('/subscription/submit', [SubscriptionController::class, 'store'])->name('subscription.submit');
    Route::get('/subscription/edit/{id}', [SubscriptionController::class, 'edit'])->name('subscription.edit');
    Route::post('/subscription/update/{id}', [SubscriptionController::class, 'update'])->name('subscription.update');
    Route::get('/subscription/update-status/{id}',  [SubscriptionController::class, 'updateStatus'])->name('subscription.updateStatus');
    Route::get('/subscription/delete/{id}',  [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
    //Gift
    Route::get('/gift', [GiftController::class, 'getAllGift'])->name('gift');
    Route::get('/gift/create', [GiftController::class, 'create'])->name('gift.create');
    Route::post('/gift/submit', [GiftController::class, 'store'])->name('gift.submit');
    Route::get('/gift/edit/{id}', [GiftController::class, 'edit'])->name('gift.edit');
    Route::post('/gift/update/{id}', [GiftController::class, 'update'])->name('gift.update');
    Route::get('/gift/delete/{id}',  [GiftController::class, 'destroy'])->name('gift.destroy');
    // Route::get('/gift/update-status/{id}',  [GiftController::class, 'updateStatus'])->name('gift.updateStatus');

    //payment
    Route::get('/payment', [PaymentController::class, 'getAllPayments'])->name('payment');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/submit', [PaymentController::class, 'store'])->name('payment.submit');
    Route::get('/payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('/payment/delete/{id}',  [PaymentController::class, 'destroy'])->name('payment.destroy');

    //verification
    Route::get('/verification', [VerificationController::class, 'verifiedUsers'])->name('verification.verified');
    Route::get('/unVerifiedUser', [VerificationController::class, 'unVerifiedUser'])->name('verification.unverified');
    Route::get('/verification/create', [VerificationController::class, 'create'])->name('verification.create');
    Route::post('/verification/submit', [VerificationController::class, 'store'])->name('verification.submit');
    Route::get('/verification/edit/{id}', [VerificationController::class, 'edit'])->name('verification.edit');
    Route::post('/verification/update/{id}', [VerificationController::class, 'update'])->name('verification.update');
    Route::get('/verification/delete/{id}',  [VerificationController::class, 'destroy'])->name('verification.destroy');
    
    //live stream for fake User
    Route::get('/liveStream', [LiveStreamController::class, 'allLiveStream'])->name('liveStream');
    Route::get('/liveStream/create', [LiveStreamController::class, 'create'])->name('liveStream.create');
    Route::post('/liveStream/submit', [LiveStreamController::class, 'store'])->name('liveStream.submit');
    Route::get('/liveStream/edit/{id}', [LiveStreamController::class, 'edit'])->name('liveStream.edit');
    Route::post('/liveStream/update/{id}', [LiveStreamController::class, 'update'])->name('liveStream.update');
    Route::get('/liveStream/delete/{id}',  [LiveStreamController::class, 'destroy'])->name('liveStream.destroy');
    
    //reports
    Route::get('/report', [UserReportController::class, 'allReports'])->name('report');
    Route::get('/report/edit/{id}', [UserReportController::class, 'edit'])->name('report.edit');
    Route::post('/report/update/{id}', [UserReportController::class, 'update'])->name('report.update');
    Route::get('/report/delete/{id}',  [UserReportController::class, 'destroy'])->name('report.destroy');
    


    //Settings Route
    Route::get('/settings',[AdminSettingsController::class, 'settings'])->name('settings');
    Route::post('/settings/update',[AdminSettingsController::class, 'update'])->name('settings.update');

    //Notification Route
    Route::get('notification',[NotificationController::class, 'index'])->name('notification');
    Route::post('notifications/send',[NotificationController::class, 'send'])->name('notification.send');
    //gallery
    Route::get('gallery',[UserPhotosController::class, 'allUsersPhotos'])->name('gallery');
    //changePassword
    Route::get('change-password',[ChangePasswordController::class, 'index'])->name('changePassword');
    Route::post('password/update',[ChangePasswordController::class, 'changePassword'])->name('password.update');

    //matchController
    Route::get('/usersWhoLikedMe/{id}', [LikedPageController::class, 'usersWhoLikedMe'])->name('like.usersWhoLikedMe');
    Route::get('/usersIliked/{id}', [LikedPageController::class, 'usersIliked'])->name('like.usersIliked');

    
    //FakeUser Controller
    Route::get('/fakeUsers', [FakeUserController::class, 'fakeUsersList'])->name('fakeUser.fakeUsersList');
    Route::get('/fakeUsers/create', [FakeUserController::class, 'create'])->name('fakeUser.create');
    Route::post('/fakeUsers/submit', [FakeUserController::class, 'store'])->name('fakeUser.submit');
    
    //Comment Controller
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/comments/submit', [CommentController::class, 'store'])->name('comments.submit');
    Route::get('/comments/edit/{id}', [CommentController::class, 'edit'])->name('comments.edit');
    Route::post('/comments/update/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::get('/comments/delete/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
   
});