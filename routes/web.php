<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ExploreController;
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

Route::get('/', function () {
    return view('pages.home.index');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('pages.dashboard.map.index');
    })->name('dashboard');

    Route::group([
        "prefix" => "explore",
    ], function() {
        Route::get("/", [ExploreController::class, 'index'])->name('explore.index');
    });
});

Route::group([
    "prefix" => "events",
], function() {
    Route::get("/novo", [EventController::class, 'create'])->name('events.create');
    Route::post("/publicar", [EventController::class, 'store'])->name('events.store');
});
