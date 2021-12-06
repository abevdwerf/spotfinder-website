<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Auth::Routes();

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get("/", function () {
        return View("landings-page", ["page" => "Landings page"]);
    });

    Route::get("dashboard", function () {
        return View("dashboard", ["page" => "Dashboard"]);
    });

    Route::get("reservate", function () {
        return View("reservate", ["page" => "Reservate"]);
    });

?>
