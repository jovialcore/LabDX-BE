<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'dob' => 'required',
            'gender' => 'required',
            'pass' => 'required|min:8'
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'dateofbirth' => $request->dob,
            'gender' =>   $request->gender,
            'password' => bcrypt($request->pass)
        ]);

        return response()->json([
            'token' => $user->createToken('labdxRegToken')->plainTextToken,
            'user' => $user
        ]);
    }


    public  function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        if (!Auth::attempt($credentials)) {
            return response()->json(['Invalid login credentials'], 401);
        }
        return response()->json([
            'token' => Auth::user()->createToken('labdxLoginToken')->plainTextToken,
            'user' => Auth::user()
        ], 201);
    }
}
