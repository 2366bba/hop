<?php

use App\Http\Controllers\AuthenticationsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['web', 'disableBackButton'])->group(function(){
    Route::middleware(['web'])->group(function(){
        Route::get('login', [AuthenticationsController::class, 'login'])->name('login');
        Route::post('postlogin', [AuthenticationsController::class, 'postLogin'])->name('postlogin');
    });
    Route::get('logout', [AuthenticationsController::class, 'logout'])->name('logout');
});

Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web', 'superadmin'])->group(function(){
        Route::get('dashboard', function(){
            return view('pages.dashboard');
        })->name('dashboard');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web', 'admin'])->group(function(){
        Route::get('dashboard', function(){
            return view('pages.dashboard');
        })->name('dashboard');
    });
});