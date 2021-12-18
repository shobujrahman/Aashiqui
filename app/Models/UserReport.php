<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reporterUser()
    {
        return $this->belongsTo(User::class,'reporter_id')->select('users.id','users.name','users.email');
    }
    public function reportedUser()
    {
        return $this->belongsTo(User::class,'reported_id')->select('users.id','users.name','users.email');
    }
    public function reportedPhoto()
    {
        return $this->belongsTo(UserPhoto::class,'user_photo_id');
    }
}
