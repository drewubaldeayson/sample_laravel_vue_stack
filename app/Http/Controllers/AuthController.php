<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user_creds = User::where('email',$email )->first();

        if (!Auth::attempt(array('email' => $email, 'password' => $password))){
            $response =[
                'success' => false,
                'message' => 'Invalid email or password'
            ];
           return response($response, 401);
        }

        $token = $user_creds->createToken('authToken');

        $response = [
            'success' => true,
            'message' => 'Login successfully!',
            'access_token' => $token->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => \Carbon\Carbon::parse(
                $token->token->expires_at
              )->toDateTimeString()

        ];

        return response($response, 200);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        $response = [
            'success' => true,
            'message' => 'Logout successfully!'
        ];
        return response($response, 200);
    }
}
