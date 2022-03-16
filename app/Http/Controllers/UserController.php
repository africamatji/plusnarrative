<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct () {
        $this->middleware('permission:', ['only' => ['destroy']]);
    }

    public function list () {
        $users = User::get();

        return Inertia::render('Dashboard',[
            'users' => $users,
        ]);
    }

    public function view () {
        $roles = Role::pluck('name','name')->all();

        return Inertia::render('UserCreate',[
            'roles' => $roles,
        ]);
    }

    public function create (Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

    }
}