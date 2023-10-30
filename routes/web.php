<?php

use App\Http\Controllers\TimeSlotController;
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


Route::any("/timeslot", [TimeSlotController::class, "index"]);
Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);
Route::post("/logout", [UserController::class, "logout"]);


Route::get('/timeslot/tableView', [TimeSlotController::class,"tableView"]);
Route::get('/displayTimeSlot', [TimeSlotController::class,"displayTimeSlot"]);

Route::any("/createTimeSlot", [TimeSlotController::class, "createTimeSlot"]);

Route::post("/submitTimeSlot", [TimeSlotController::class, "submitTimeSlot"]);

Route::post("/bookTimeSlot", [TimeSlotController::class, "bookTimeSlot"]);

Route::post("/unBookTimeSlot", [TimeSlotController::class, "unBookTimeSlot"]);
