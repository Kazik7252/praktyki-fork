<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function storeRegisterData()
    {
    // var_dumb(request()->all());

         $reg = request() ->validate([
              'username'          => 'required|min:3|max:255',
              'email'             => 'required|email',
              'password'          => 'required_with:confirm_password|same:confirm_password|min:8|max:255',
              'confirm_password'  => 'required|min:8|max:255|'
        ]);
        return response(['reg' => $reg],200);
    }
}
