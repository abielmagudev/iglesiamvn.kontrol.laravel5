<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function edit()
    {
    	return view('account.edit')->with('auth', Auth::user());
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|max:128'
    	]);

    	$user = Auth::user();
    	$user->name = $request->name;

    	if( $request->has('password') )
        {
            $this->validate($request, [
                'password' => 'required|min:6'
            ]);
    		$user->password = bcrypt( $request->password );
        }

    	if(! $user->save() )
            return back()->with('error', 'Error al actualizar tu cuenta');
        
        return redirect()->route('account.edit')
                         ->with('success', 'Tu cuenta ha sido actualizada');
    }
}

// https://styde.net/como-trabajar-con-form-requests-en-laravel/