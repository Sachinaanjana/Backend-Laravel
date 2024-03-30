<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    public function login(Request $request)
{

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'data' => $user,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'message' => 'Login invalid',
            ]);
        }

}

}
