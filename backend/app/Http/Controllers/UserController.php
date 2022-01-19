<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {
        // var_dumb(request()->all());

        $request ->validate([
              'username'          => 'required|min:3|max:255',
              'email'             => 'required|email',
              'password'          => 'required_with:confirm_password|same:confirm_password|min:8|max:255',
              'confirm_password'  => 'required|min:8|max:255|'
        ]);

        $request ['password'] = bcrypt($request['password']);

        $user =  User::create([
            'username'            => $request->username,
            'email'               => $request->email,
            'password'            => $request->password,
        ]);

        auth()->login($user);

        return response(['user' => $user],201);
    }

    public function login(Request $request)
    {
        $request -> validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        $userdata = array(
            'username' => $request -> username,
            'password' => $request -> password
        );

        //TODO logowanie
        Auth::attempt($userdata);

    }

    public function logout()
    {
        auth() -> logout();

        return response(['Message' => 'Success, Goodbye!']);
    }
}
