<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Auth::Routes();

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get("/", function () {
        return View("landings-page", ["page" => "Landings page"]);
    });

    Route::get("download", function () {
        echo "<script>window.close();</script>";
    });

    Route::get("dashboard", [App\Http\Controllers\DashboardController::class, 'Initialization']);
    Route::get("rooms", [App\Http\Controllers\DashboardController::class, 'GetRooms']);

    Route::get("reservate", function () {
        return View("reservate", ["page" => "Reservate"]);
    });
?>
