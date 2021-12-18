<?php

namespace App\services\Location;

class UserLocation
{
    public function updateUserLocation($user, $latitude, $longitude)
    {
        $user->latitude = $latitude;
        $user->longitude = $longitude;
        $user->save();
    }
}
