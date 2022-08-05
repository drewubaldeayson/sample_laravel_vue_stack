<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $userInfo = User::create([
            'name'=> $name,
            'email'=> $email,
            'password' => Hash::make($password),
        ]);

        $response =[
            'data'=> $userInfo,
            'success' => true,
            'message' => 'Account registered successfully!',
        ];

        return response($response, 200);
    }
}
