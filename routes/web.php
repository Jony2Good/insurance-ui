<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard.main');
    })->name('dashboard');

    Route::get('/me', function () {
        return view('dashboard.components.personal');
    })->name('me');

    Route::get('/bills', function () {
        return view('dashboard.components.billing');
    })->name('bills');

    Route::get('/auto', function () {
        return view('dashboard.components.auto');
    })->name('auto');

    Route::get('/policies', function () {
        return view('dashboard.components.policies');
    })->name('policies');

    Route::get('/osago', function () {
        return view('dashboard.components.osago');
    })->name('osago');
});
