<?php
namespace App\Src\Explore\Routes;

use App\Src\Explore\Controllers\ExploreController;
use Illuminate\Support\Facades\Route;

class ExploreRoutes
{
    public static function routes()
    {
        Route::group([
            "prefix" => "explore",
        ], function() {
            Route::get("/", [ExploreController::class, 'index'])->name('explore.index');
        });
    }
}
