<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function checkToken(Request $request)
    {
        //
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'exists:users,email|required',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            // GENERATE token reset code
            // SEND E-mail with reset code
            // RETURN message;
        }

        // RETURN fails
    }

    public function reset(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'confirmed|min:6|required'
        ]);

        $user = User::findOrFail($id);

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            //SEND E-mail Alert Changes...
            //RETUNR message;
        }

        // RETURN fails
    }
}
