<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
    public function login(Request $request)
    {
        //Validation
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required',
        ]);

        //Validation Control
        if ($validator->fails()) {
            return $this->errorResponse('Invalid Format', 403, $validator->errors());
        }

        //Credential Control
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        { 
            $user = Auth::user(); 
            $success['access_token'] =  $user->createToken('TestCaseApp')->plainTextToken; 
            $success['user'] =  $user;
            return $this->successResponse($success, 'User login successfully');
        } else { 
            return $this->errorResponse('Unauthorized', 401);
        } 

    }   

    public function logout(Request $request)
    {
        $user = Auth::user();
        $request->user()->tokens()->delete();
        return $this->successResponse(null, 'Logout successfully');

    }
}
