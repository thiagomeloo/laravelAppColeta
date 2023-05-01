<?php

use App\Src\Explore\Routes\ExploreRoutes;
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

    ExploreRoutes::routes();
});
