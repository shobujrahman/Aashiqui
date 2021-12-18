<?php

namespace App\services;


use Willywes\AgoraSDK\RtcTokenBuilder;

class AgoraService
{

    public static function GetToken($user_id, $appID, $appCertificate, $channelName)
    {

        $appID = $appID;
        $appCertificate = $appCertificate;
        $channelName = $channelName;
        $uid = $user_id;
        $uidStr = ($user_id) . '';
        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = (new \DateTime("now", new \DateTimeZone('UTC')))->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        return RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
    }
}
