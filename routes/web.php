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

    Route::get("dashboard", [App\Http\Controllers\DashboardController::class, 'index']);

    Route::get("rooms", [App\Http\Controllers\DashboardController::class, 'getRooms']);
    Route::get("room/{id}", [App\Http\Controllers\DashboardController::class, 'GetRoom']);

    Route::get("reservate", [App\Http\Controllers\ReservationController::class, 'index']);
    Route::get("reservate/{id}", [App\Http\Controllers\ReservationController::class, 'show']);
?>
