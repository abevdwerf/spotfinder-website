<?php

use App\Http\Controllers\DeskController;
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

Route::get('desks', [DeskController::class, 'index']);
Route::post('desk/create', [DeskController::class, 'store']);
Route::put('desk/update/{id}', [DeskController::class, 'update']);
Route::delete('desk/delete/{id}', [DeskController::class, 'destroy']);

Route::get('floors', [DeskController::class, 'index']);
Route::post('floor/create', [DeskController::class, 'store']);
Route::put('floor/update/{id}', [DeskController::class, 'update']);
Route::delete('floor/delete/{id}', [DeskController::class, 'destroy']);

Route::get('locations', [DeskController::class, 'index']);
Route::post('location/create', [DeskController::class, 'store']);
Route::put('location/update/{id}', [DeskController::class, 'update']);
Route::delete('location/delete/{id}', [DeskController::class, 'destroy']);

Route::get('modules', [DeskController::class, 'index']);
Route::post('module/create', [DeskController::class, 'store']);
Route::put('module/update/{id}', [DeskController::class, 'update']);
Route::delete('module/delete/{id}', [DeskController::class, 'destroy']);

Route::get('reservations', [DeskController::class, 'index']);
Route::post('reservation/create', [DeskController::class, 'store']);
Route::put('reservation/update/{id}', [DeskController::class, 'update']);
Route::delete('reservation/delete/{id}', [DeskController::class, 'destroy']);

Route::get('rooms', [DeskController::class, 'index']);
Route::post('room/create', [DeskController::class, 'store']);
Route::put('room/update/{id}', [DeskController::class, 'update']);
Route::delete('room/delete/{id}', [DeskController::class, 'destroy']);