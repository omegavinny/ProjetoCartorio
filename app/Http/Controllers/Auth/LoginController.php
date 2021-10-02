<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('auths.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if (!$user || Hash::check($request->password, $user->password)) {
            return response()->json(null, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json($user, Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        //
    }
}
