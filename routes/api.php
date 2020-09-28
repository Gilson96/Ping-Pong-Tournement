<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Games;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// all of the routes are in the /games end-point
Route::group(["prefix" => "games"], function () {

    // GET /games: show all games
    Route::get("", [Games::class, "index"]);

    // POST /games: create a new game
    Route::post("", [Games::class, "store"]);

    // all these routes also have an game ID in the
    // end-point, e.g. /games/8
    Route::group(["prefix" => "{id}"], function () {
    // GET /games/8: show the game
        Route::get("", [Games::class, "show"]);
        // UPDATE /games/8: update the game
        Route::patch("", [Games::class, "update"]);
        // DELETE /games/8: delete the game
        Route::delete("", [Games::class, "destroy"]);
    });
});