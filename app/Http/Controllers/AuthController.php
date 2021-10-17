    <?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $nameAttr = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);


        $user = User::create([
            'name' => $nameAttr['name'],
            'email' => $nameAttr['email'],
            'password' => bcrypt($nameAttr['password'])
        ]);

        return response()->json([
            'token' => $user->createToken('labdxRegToken')->plainTextToken
        ]);
    }


    public  function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        if (!Auth::attempt($credentials)) {
            return response()->json(['Wrong Login Details'], 401);
        }
        return response()->json([
            'token' => Auth::user()->createToken('labdxLoginToken')->plainTextToken,
            'user' => Auth::user()
        ], 201);
    }
}
