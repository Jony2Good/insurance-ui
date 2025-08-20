<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserActionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JwtSessionAuth;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('dashboard')
    ->middleware([JwtSessionAuth::class])
    ->group(function () {
        Route::get('/', fn() => view('dashboard.main'))->name('dashboard');

        Route::get('/me', [UserController::class, 'makePersonalPage'])->name('me');
        Route::post('/me', [UserActionController::class, 'updatePersonals'])->name('me.update');

        Route::get('/bills', [UserController::class, 'makeBillingPage'])->name('bills');
        Route::post('/bills', [UserActionController::class, 'updateBills'])->name('bills.update');

        Route::get('/auto', [UserController::class, 'makeAutoPage'])->name('auto');
        Route::post('/auto', [UserActionController::class, 'updateAuto'])->name('auto.update');    
        
        Route::get('/osago', [UserController::class, 'makeOsagoPage'])->name('osago');
        Route::post('/calc', [UserActionController::class, 'calc'])->name('calc');
        Route::post('/pay', [UserActionController::class, 'payment'])->name('pay');

        Route::get('/policies', [UserController::class, 'makePoliciesPage'])->name('policies');

        Route::get('/file', [UserActionController::class, 'file'])->name('file');

        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });
