<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // TODO Ten kod jest nie uporządkowany, nie dokończony, większość z tych funkcji została przeniesiona do UserController

    // public function registerUser(Request $request)
    // {
    //     $request -> validate([
    //         'username'  => 'required',
    //         'password'  => 'required'
    //     ]);

    //     if (auth() -> attempt([
    //         'username' => $request -> username,
    //         'password' => $request -> password
    //     ]));

        // {
        //     return response (['Message' => 'Welcome Back!']);
        // }

        // auth failed TODO

        // return back() ->withErrors();

    // }

    // public function logout()
    // {
    //     auth() -> logout();

    //     return response(['Message' => 'Success, Goodbye!']);
    // }
}
