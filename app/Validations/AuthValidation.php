<?php

namespace App\Validations;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthValidation
{
    public function RegisterValidation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
                'name' => 'required|min:3',
                'contactNo' => 'required|min:10',
               

            ]
        );
        if ($validator->fails()) {
            $validationError = $validator->errors()->first();
            return ['success' => false, 'message' => $validationError];
        }
        return ['success' => true];
    }

    public function LoginValidation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]
        );
        if ($validator->fails()) {
            $validationError = $validator->errors()->first();
            return ['success' => false, 'message' => $validationError];
        }
        return ['success' => true];
    }


    public function socialValidation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'providerName' => 'required',
                'providerAccessToken' => 'required',
            ]
        );
        if ($validator->fails()) {
            $validationError = $validator->errors()->first();
            return ['success' => false, 'message' => $validationError];
        }
        return ['success' => true];
    }
}
