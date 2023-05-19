<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventInteractionController;
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

    /* --------------------------------- EVENTS --------------------------------- */
    Route::group(["prefix" => "events"], function () {
        Route::get("/new", [EventController::class, 'create'])->name('dashboard.events.create');
        Route::post("/publish", [EventController::class, 'store'])->name('dashboard.events.store');
        Route::get("/{event}", [EventController::class, 'show'])->name('dashboard.events.show');

        Route::middleware('can:update,event')->group(function () {
            Route::get("/{event}/edit", [EventController::class, 'edit'])->name('dashboard.events.edit');
            Route::put("/{event}/update", [EventController::class, 'update'])->name('dashboard.events.update');
        });

        Route::get("/{event}/comments/new", [EventInteractionController::class, 'store'])->name('dashboard.events.eventInteractions.store');
        Route::get("/comments/{eventInteraction}/delete", [EventInteractionController::class, 'delete'])->name('dashboard.events.eventInteractions.delete');
    });
});
