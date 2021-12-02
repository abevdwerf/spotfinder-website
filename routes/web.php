<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Auth::Routes();

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get("/", function () {
        return View("landings-page");
    });

    Route::get("dashboard", function () {
        return View::make("dashboard", ["page" => "dashboard"]);
    });

    Route::get("reserveren", function () {
        return View::make("reserveren", ["page" => "reserveren"]);
    });

?>
