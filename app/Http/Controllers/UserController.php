<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Inertia\Inertia;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct () {
        $this->middleware('permission:', ['only' => ['destroy']]);
        //$this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    }

    public function list () {
        $users = User::get();
        return Inertia::render('Dashboard',[
            'users' => $users,
        ]);
    }

    public function viewCreate () {
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
            'password' => 'required|same:confirm_password',
            'roles' => 'required|array'
        ]);
        $input = $request->all();
        $input['name'] = $request->input('first_name');
        $input['password'] = Hash::make($request->input('password'));
        $input = Arr::except($input,array('confirm_password'));
        $user = User::create($input);

        forEach($request->input('roles') as $role){
            $user->assignRole($role);
        }

        return redirect()->route('dashboard');
    }

    public function viewUpdate (Request $request) {
        $user = User::where('id', '=', $request->id)->first();
        $user_roles = $user->getRoleNames();
        $roles = Role::pluck('name','name')->all();

        return Inertia::render('UserUpdate',[
            'user' => $user,
            'user_roles' => $user_roles,
            'roles' => $roles
        ]);
    }

    public function update (Request $request) {
        $id = $request->input('id');

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm_password',
            'roles' => 'required|array'
        ]);

        $input = $request->all();
        $input['name'] = $request->input('first_name');
        
        if(!empty($request->input('password'))){ 
            $input['password'] = Hash::make($request->input('password'));
        }else{
            $input = Arr::except($input,array('password'));    
        }

        $user = User::find($id);
        $user->update($input);
        
        $user->syncRoles($request->input('roles'));

        return redirect()->route('dashboard');
    }
}