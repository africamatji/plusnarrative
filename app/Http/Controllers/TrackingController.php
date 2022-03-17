<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{

    public function create () {

        dd(Auth::id());
    }

}