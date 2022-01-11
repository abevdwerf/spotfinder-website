<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DeskController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.apikey')->group(function () {
    Route::get('desks', [DeskController::class, 'index']);
    Route::post('desk/create', [DeskController::class, 'store']);
    Route::put('desk/update/{id}', [DeskController::class, 'update']);
    Route::delete('desk/delete/{id}', [DeskController::class, 'destroy']);

    Route::get('floors', [FloorController::class, 'index']);
    Route::post('floor/create', [FloorController::class, 'store']);
    Route::put('floor/update/{id}', [FloorController::class, 'update']);
    Route::delete('floor/delete/{id}', [FloorController::class, 'destroy']);

    Route::get('locations', [LocationController::class, 'index']);
    Route::post('location/create', [LocationController::class, 'store']);
    Route::put('location/update/{id}', [LocationController::class, 'update']);
    Route::delete('location/delete/{id}', [LocationController::class, 'destroy']);

    Route::get('modules', [ModuleController::class, 'index']);
    Route::post('module/create', [ModuleController::class, 'store']);
    Route::put('module/update/{id}', [ModuleController::class, 'update']);
    Route::delete('module/delete/{id}', [ModuleController::class, 'destroy']);

    Route::get('reservations', [ReservationController::class, 'index']);
    Route::post('reservation/create', [ReservationController::class, 'store']);
    Route::put('reservation/update/{id}', [ReservationController::class, 'update']);
    Route::delete('reservation/delete/{id}', [ReservationController::class, 'destroy']);

    Route::get('rooms', [RoomController::class, 'index']);
    Route::post('room/create', [RoomController::class, 'store']);
    Route::put('room/update/{id}', [RoomController::class, 'update']);
    Route::delete('room/delete/{id}', [RoomController::class, 'destroy']);

    Route::get('roomtypes', [RoomTypeController::class, 'index']);
    Route::post('roomtype/create', [RoomTypeController::class, 'store']);
    Route::put('roomtype/update/{id}', [RoomTypeController::class, 'update']);
    Route::delete('roomtype/delete/{id}', [RoomTypeController::class, 'destroy']);

    Route::get('sensors', [SensorController::class, 'index']);
    Route::post('sensor/create', [SensorController::class, 'store']);
    Route::put('sensor/update/{id}', [SensorController::class, 'update']);
    Route::delete('sensor/delete/{id}', [SensorController::class, 'destroy']);

    Route::get('users', [UserController::class, 'index']);
//    Route::post('user/create', [UserController::class, 'store']);
//    Route::put('user/update/{id}', [UserController::class, 'update']);
//    Route::delete('user/delete/{id}', [UserController::class, 'destroy']);

    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
});
