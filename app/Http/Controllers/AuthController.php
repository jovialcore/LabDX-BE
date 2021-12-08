<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    //the array key names represents your html attribute names
        $nameAttr = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'dob' => 'required',
            'gender' => 'required',
            'pass' => 'required|min:8'
        ]);

 //the array key names represents your model/table_column names
        $user = User::create([
            'name' => $nameAttr['name'],
            'email' => $nameAttr['email'],
            'dateofbirth' => $request->dob,
            'gender'=>  $nameAttr['gender'],
            'password' => bcrypt($request->pass)
        ]);

        return response()->json([
            'token' => $user->createToken('labdxRegToken')->plainTextToken,
            'user' => Auth::user()
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
