<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/* ------------------------------- ROUTE HOME ------------------------------- */
Route::get('/', function () {
    return view('pages.home.index');
});

/* -------------------------------------------------------------------------- */
/*                                 ROUTES AUTH                                */
/* -------------------------------------------------------------------------- */
Route::group(['prefix' => 'auth'], function () {
    Route::controller(AuthController::class)->group(function () {

        Route::group(['prefix' => 'login'], function () {
            Route::get('/', 'index')->name('auth.login'); //VIEW LOGIN

            //GOOGLE
            Route::get('google/redirect', 'googleRedirect')->name('auth.google.redirect');
            Route::get('google/callback', 'googleCallback')->name('auth.google.callback');

            //FACEBOOK
            Route::get('facebook/redirect', 'facebookRedirect')->name('auth.facebook.redirect');
            Route::get('facebook/callback', 'facebookCallback')->name('auth.facebook.callback');
        });
    });
});


/* -------------------------------------------------------------------------- */
/*                              ROUTES DASHBOARD                              */
/* -------------------------------------------------------------------------- */
Route::group(['prefix' => 'dashboard'], function () {

    //AGRUPAR AS ROTAS POR CONTROLLERS

});





Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('pages.dashboard.map.index');
    })->name('dashboard');
});
