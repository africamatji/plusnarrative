<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ]);

        //$input = $request->all();
        //dd($input);
        $input = [
            'name' => $request->input('first_name'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role')
        ];
        //$input['password'] = Hash::make($input['password']);
        
        $user = User::create($input);
        $user->assignRole($request->input('role'));

        return redirect()->route('dashboard');
    }
}