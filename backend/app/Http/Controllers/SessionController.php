<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        $request -> validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        if (auth() -> attempt([
            'username' => $request -> username,
            'password' => $request -> password
        ]))

        {
            return response (['Message' => 'Welcome Back!']);
        }

        //auth failed TODO

        // return back() ->withErrors();

    }

    public function destroy()
    {
        auth() -> logout();

        return response(['Message' => 'Success, Goodbye!']);
    }
}
