<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function welcome () {
        return Inertia::render('Home', ['test' => 'Its works']);
    }

    public function pages () {
        return Inertia::render('Pages');
    }
}