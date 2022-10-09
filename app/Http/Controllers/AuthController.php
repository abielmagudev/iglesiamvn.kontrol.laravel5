<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if( Auth::check() )
            return redirect()->route('dashboard.index');

    	return view('layouts.login');
    }

    public function logging(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:3'
        ]);

        if(! Auth::attempt($request->only('email', 'password') ) )
            return redirect()
                    ->route('login')
                    ->with('danger', 'Usuario o contraseña incorrectos');

    	return redirect()->route('dashboard.index');
    }

    public function logout()
    {
        \Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}

/*
redirect()
->route()
->with('name_var', 'value_var')
->withErrors('value_var');

Session::flash('error', 'value_text');

Helper auth();
*/