<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});



Route::any("/timeslot", "App\Http\Controllers\TimeSlotController@index");
Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);
Route::post("/logout", [UserController::class, "logout"]);



Route::get('/displayTimeSlot', "App\Http\Controllers\TimeSlotController@displayTimeSlot");

Route::any("/createTimeSlot", "App\Http\Controllers\TimeSlotController@createTimeSlot");

Route::post("/submitTimeSlot", "App\Http\Controllers\TimeSlotController@submitTimeSlot");

Route::post("/bookTimeSlot", "App\Http\Controllers\TimeSlotController@bookTimeSlot");

Route::post("/unBookTimeSlot", "App\Http\Controllers\TimeSlotController@unBookTimeSlot");
