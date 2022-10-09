<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::where('id', '!=', Auth::user()->id)->orderBy('id', 'desc')->simplePaginate(15);
        $users_paginate = User::orderByDesc('id')->simplePaginate(20);
        
        return view('users.index', [
            'levels' => config('kontrol.levels'),
            'users_count' => $users_paginate->count(),
            'users_filtered' => $users_paginate->except( auth()->user()->id ),
            'pagination' => paginationInstance($users_paginate),
        ]);
    }

    public function create()
    {
        return view('users.create', [
            'user' => new User,
            'levels' => config('kontrol.levels'),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:120',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        $request->merge([
            'password' => bcrypt($request->password),
            'remember_token' => bcrypt('secret')
        ]);

        if(! $user = User::create( $request->all() ) )
            return back()->withErrors('Error al guardar nuevo usuario');
        
        return redirect()
                ->route('users.index')
                ->with('success', 'Nuevo usuario guardado');
    }

    public function show($id)
    {
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        return view('users.edit', [
            'user' => User::findOrFail($id),
            'levels' => config('kontrol.levels'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:120',
            'email' => 'required|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->updated_at = date('Y-m-d H:i:s');

        if( $request->has('password') )
        {
            $this->validate($request, ['password' => 'min:6']);
            $user->password = bcrypt($request->password);
        }

        if(! $user->save() )
            return back()->withErrors('Error al actualizar usuario');
    
        return redirect()->route('users.edit', $user)->with('success', 'Usuario actualizado');
    }

    public function delete($id)
    {
        return view('users.delete')->with('user', User::findOrFail($id));
    }

    public function destroy($id)
    {
        if(! User::destroy($id) )
            return back()->with('error', 'Error al eliminar usuario');
        
        $user_name = request('name', 'desconocido');
        return redirect()->route('users.index')->with('success', "Usuario {$user_name} eliminado");
    }
}