<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $guarded = [];
    
     protected $hidden = [
        'password',
        'remember_token',
    ];

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'following_id','follower_id')
           ->select(['follower_id','name', 'profile_pic']);
             
    }
    
    public function followersCount(){
        return $this->belongsToMany(User::class,'user_follows','following_id','follower_id')
        ->where('user_follows.following_id',$this->id)->count();
    }

   public function following()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'follower_id' ,'following_id')
           ->select([ 'following_id', 'name', 'profile_pic']);
            
    }

    public function followingCount(){
        return $this->belongsToMany(User::class,'user_follows','follower_id','following_id')
        ->where('user_follows.follower_id',$this->id)->count();
    }



    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'user_interests', 'user_id', 'interestId');
    }

    // public function likers(){
    //     return $this->belongsToMany(User::class,'user_to_user_likes','liker_id','liked_id');
    // }
    // public function liked(){
    //     return $this->belongsToMany(User::class,'user_to_user_likes','liker_id','liked_id');
    // }

    public function photos()
    {
        return $this->hasMany(UserPhoto::class, 'userId');
    }

    public function profilePics()
    {
        return $this->hasMany(ProfilePic::class, 'userId');
    }

    public function videos()
    {
        return $this->hasMany(UserVideo::class, 'userId');
    }

    public function videoComments()
    {
        return $this->hasMany(VideoComment::class, 'user_id', 'video_id');
    }


    public function userLikes()
    {
        return $this->hasMany(UserLike::class, 'liked', 'id');
    }

    //current subscription plan
    public function currentSubscriptionPlan()
    {
        return $this->hasOneThrough(
            SubscriptionPlan::class,
            UserSubscription::class,
            'user_id', // Foreign key on user_subscription table...
            'id', // Foreign key on user table...
            'id', // Local key on user_subscription table...
            'subscription_id' // Local key on SubscriptionPlan table...
        );
    }


    public function userSubscription()
    {
        return $this->hasOne(UserSubscription::class, 'user_id', 'id');
    }
    
    public function userPhoto()
    {
        return $this->hasMany(UserPhoto::class, 'userId');
    }
    
    public function userPhotoLastThree()
    {
        return $this->userPhoto()->orderBy('id', 'desc')->take(3);
    }
    public function getBirthdateAttribute()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }
    public function isFollowing($userId)
    {
        return $this->following()->where('following_id', $userId)->exists();
    }


    public function fakeVideos()
    {
        return $this->hasMany(FakeUserLiveStreaming::class, 'user_id');
    }

    public function blockedUsers()
    {
        return $this->belongsToMany(User::class, 'user_blocks', 'blockerId' ,'blockedId')
        ->select([ 'blockedId', 'name', 'profile_pic','email']);
    }
    

}