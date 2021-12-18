<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\services\AgoraService;
use Illuminate\Http\Request;

class AgoraTokenGeneratorController extends Controller
{
    public function generateToken(Request $request)
    {
        $appID = $request->appID;
        $appCertificate = $request->appCertificate;
        $channelName =  $request->channelName;

        $uid = 0;

        $agora_token = AgoraService::GetToken($uid,  $appID, $appCertificate, $channelName);

        return response()->json([
            'success' => true,
            'data' => $agora_token
        ]);
    }
}
