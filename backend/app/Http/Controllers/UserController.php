<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {
        // var_dumb(request()->all());

        $request ->validate([
              'username'          => 'required|min:3|max:255',
              'email'             => 'required|email',
              'password' => 'required|min:8|max:255|confirmed'
        ]);

        $request ['password'] = bcrypt($request['password']);

        $user =  User::create([
            'username'            => $request->username,
            'email'               => $request->email,
            'password'            => $request->password,
        ]);


        return response(['user' => $user],201);
    }

    public function login(Request $request)
    {
        $request -> validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        $user = User::where('username', $request->username);

        if (Hash::check($user['password'], $request->password))
            $user->createToken();


    }

    public function logout()
    {
        //$user->tokens()->delete();
        return response(['Message' => 'Success, Goodbye!']);
    }
}
