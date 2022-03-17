<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PageController extends Controller
{
    public function view () {
        return Inertia::render('Pages');
    }
}