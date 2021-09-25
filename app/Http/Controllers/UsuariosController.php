<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsuariosController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users, Response::HTTP_OK);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'active'   => 'required',
            'email'    => 'email|required|unique:users',
            'name'     => 'required',
            'password' => 'confirmed|min:6|required',
            'type'     => 'required',
        ]);

        $user = User::create([
            'active'   => $request->active,
            'email'    => $request->email,
            'name'     => $request->name,
            'password' => bcrypt($request->password),
            'type'     => $request->type,
        ]);

        return response()->json($user, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $rules_validation = [
            'active' => 'required',
            'email'  => "required|unique:users,email,{$id},id",
            'name'   => 'required',
            'type'   => 'required',
        ];

        if ($request->password) {
            array_push($rules_validation, ['password' => 'confirmed|min:6|required',]);
        }

        $request->validate($rules_validation);

        $user = User::findOrFail($id);

        $user->active = $request->active;
        $user->email  = $request->email;
        $user->name   = $request->name;
        $user->type   = $request->type;

        if ($request->password) {
            $user->password = $request->password;
        }
    }
}
