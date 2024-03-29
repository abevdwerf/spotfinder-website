<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Auth::Routes();

    Route::get('location-updates', function () { return View("location-updates", ["page" => "Location updates"]); });
    Route::get('service-details', function () { return View("service-details", ["page" => "Service details"]); });

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get("/", function () {
        return View("landings-page", ["page" => "Landings page"]);
    });

    Route::get("download", function () {
        echo "<script>window.close();</script>";
    });

    Route::get("dashboard", [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get("rooms", [App\Http\Controllers\RoomController::class, 'searchAvailable']);
    Route::get("allRooms", [App\Http\Controllers\RoomController::class, 'getAll']);
    Route::get("getRoomsFromFloor", [App\Http\Controllers\RoomController::class, 'getAllFromFloor']);
    Route::get("location/{id}", [App\Http\Controllers\LocationController::class, 'getLocation']);

    Route::get("reserve", [App\Http\Controllers\ReservationController::class, 'indexWeb']);
    Route::get("reservations", [App\Http\Controllers\ReservationController::class, 'searchAvailable']);
    Route::post("newReservation", [App\Http\Controllers\ReservationController::class, 'store']);

    Route::get("about-us", function () { return View("about-us", ["page" => "About us", "finder" => false]); });

    Route::get("contact", function () { return View("contact", ["page" => "Contact", "finder" => false]); });
    Route::post('contact', [App\Http\Controllers\ContactController::class, 'store']);
?>