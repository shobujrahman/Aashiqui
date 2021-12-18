<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\services\AuthService\LocalAuthentication;
use App\services\AuthService\SocialAuth;
use App\services\AuthService\PhoneAuth;
use App\Validations\AuthValidation;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authValidation;

    public function __construct(AuthValidation $authValidation)
    {
        $this->authValidation = $authValidation;
    }


    public function socialLogin(Request $request, SocialAuth $socialLogin)
    {

        $validationRes = $this->authValidation->socialValidation($request->all());
        if (!$validationRes['success']) {
            return response()->json($validationRes);
        }

        $loginResponse = $socialLogin->login(
            $request->providerName,
            $request->providerAccessToken,
        );

        return response()->json($loginResponse);
    }



    public function localRegister(Request $request, LocalAuthentication $localAuthentication)
    {
        $validationRes = $this->authValidation->RegisterValidation($request->all());

        if (!$validationRes['success']) {
            return response()->json($validationRes);
        }
        $registerResponse = $localAuthentication->register(
            $request->email,
            $request->password,
            $request->password_confirmation,
            $request->contactNo,
            $request->name,

        );
        return response()->json($registerResponse);
    }


    public function localLogin(Request $request, LocalAuthentication $localAuthentication)
    {

        $validationRes = $this->authValidation->LoginValidation($request->all());
        if (!$validationRes['success']) {
            return response()->json($validationRes);
        }
        $loginResponse = $localAuthentication->login($request->email, $request->password);
        return response()->json($loginResponse);
    }

    //phone auth
    public function checkUserWithPhone(Request $request)
    {
        $resp = PhoneAuth::checkIfUserWithNumberExist($request->phone);

        return response()->json($resp);
    }

    public function createUserWIthPhone(Request $request)
    {
        $resp = PhoneAuth::createUser($request->phone);
        return response()->json($resp);
    }



    public function registerComplete()
    {
        $user = auth()->user();
        $user->register_complete = 1;
        $user->save();
        return response()->json(['success' => true]);
    }
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'message' => 'log out successful'
        ]);
    }

    public function checkIfUserExistwithEmail(Request $request)
    {
        $user = User::where('email', $request->email)->count();
        if ($user) {
            return response()->json(['success' => true, 'data' =>  true]);
        } else {
            return response()->json(['success' => true, 'data' => false]);
        }
    }
}
