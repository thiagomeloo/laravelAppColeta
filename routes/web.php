<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\MapController;
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

    /* ----------------------------------- MAP ---------------------------------- */
    Route::group(["prefix" => "map"], function () {
        Route::controller(MapController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard.map.index');
        });
    });

    /* --------------------------------- EXPLORE -------------------------------- */
    Route::group(["prefix" => "explore"], function () {
        Route::controller(ExploreController::class)->group(function () {
            Route::get("/", 'index')->name('dashboard.explore.index');
        });
    });
});

/* --------------------------------- EVENTS --------------------------------- */
Route::group(["prefix" => "events"], function () {
    Route::get("/new", [EventController::class, 'create'])->name('events.create');
    Route::post("/publish", [EventController::class, 'store'])->name('events.store');
    Route::get("/view/{event}", [EventController::class, 'show'])->name('events.show');

    Route::middleware('can:update,event')->group(function() {
        Route::get("/edit/{event}", [EventController::class, 'edit'])->name('events.edit');
        Route::put("/update/{event}", [EventController::class, 'update'])->name('events.update');
    });
});
