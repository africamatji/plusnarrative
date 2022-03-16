<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class UserController extends Controller
{

    public function listUsers () {
        $users = User::get();

        return Inertia::render('Dashboard',[
            'users' => $users,
        ]);
    }
}