<?php
    use Illuminate\Support\Facades\Route;


    Route::get("/", function () {
        return View("landings-page");
    });

    Route::get("dashboard", function () {
        return View::make("dashboard", ["page" => "dashboard"]);
    });

    Route::get("reserveren", function () {
        return View::make("reserveren", ["page" => "reserveren"]);
    });

    Route::get("login", function () {
        return View("login");
    });

    Route::get("register", function () {
        return View("register");
    });
?>