<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit','update');
    }

    public function index()
    {
        return view('users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>"required",
        ]);

        $user->name = $request->name;
        $user->save();

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('info','Usuario actualizado con exito');
    }

}
