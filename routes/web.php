<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return Inertia::render('Home', ['test' => 'Its works']);
});

Route::get('/dashboard', function () {
    //return view('dashboard');
    return Inertia::render('Dashboard', ['test' => 'Its works']);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
