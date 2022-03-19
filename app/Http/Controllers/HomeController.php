<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function welcome () {
        return view('welcome');
    }

    public function pages () {
        return Inertia::render('Pages');
    }
}