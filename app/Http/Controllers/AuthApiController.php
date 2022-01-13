<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthApiController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

//    public function register(Request $request)
//    {
//        $fields = $request->validate([
//            'name' => 'required|string|alpha|min:2|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|confirmed|min:8|confirmed',
//            'service-conditions' => ['required']
//        ]);
//
//        $user = User::create([
//            'name' => $fields['name'],
//            'email' => $fields['email'],
//            'password' => Hash::make($fields['password'])
//        ]);
//
//        $response = [
//            'user' => $user
//        ];
//
//        return response($response, 201);
//    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'alpha_num', 'min:2', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'PasswordConfirmation' => ['required', 'same:password']
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('authToken')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success'=>$success], 200);
    }

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */

//    public function login(Request $request)
//    {
//        $fields = $request->validate([
//            'login_name' => 'required|string',
//            'password' => 'required|string'
//        ]);
//
//        //check email
//        $user = User::where('email', $fields['login_name']->first());
//
//        //check password
//        if(!$user || !Hash::check($fields['password'], $user->password))
//        {
//            return response([
//                'message' => 'bad credit'
//            ],401);
//        }
//
//        $response = [
//            'user' => $user
//        ];
//
//        return response($response, 200);
//    }

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('authToken')->accessToken;
            return response()->json(['success' => $success], 200);
        }
        else
        {
            return response()->json(['error'=>'Invalid credentials'], 401);
        }
    }
}
