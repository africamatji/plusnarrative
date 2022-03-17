<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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
/*
Route::group(['middleware' => ['api']], function () {
    Route::get('/available', [ServiceProviderController::class, 'getAvailableServiceProviders']);
    Route::post('/explore', [ServiceProviderController::class, 'exploreServiceProviders']);
    Route::get('/sp-profile/{id}', [ServiceProviderController::class, 'getServiceProviderProfilePublic']);
    Route::post('/booking/create', [BookingsController::class, 'createBooking']);
    Route::post('/payment/signature', [BookingsController::class, 'generateSignature']);
});
*/
Route::get('/', [HomeController::class, 'welcome']);
Route::group(['middleware' => ['permission:view-admin-dashboard']], function () {
    Route::get('/dashboard', [ 
        UserController::class, 'list' 
    ])->middleware(['auth'])->name('dashboard');   
    
    Route::get('/user', [ 
        UserController::class, 'viewCreate' 
    ])->middleware(['auth'])->name('userview');    

    Route::post('/user/create', [ 
        UserController::class, 'create' 
    ])->middleware(['auth'])->name('usercreate');  

    Route::get('/user/update/{id}', [ 
        UserController::class, 'viewUpdate' 
    ])->middleware(['auth'])->name('userupdateview'); 

    Route::post('/user/update', [ 
        UserController::class, 'update' 
    ])->middleware(['auth'])->name('userupdate'); 

    Route::get('/pages', [ 
        PageController::class, 'view' 
    ])->middleware(['auth'])->name('pageview');      
});

require __DIR__.'/auth.php';
