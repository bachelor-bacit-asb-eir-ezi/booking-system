<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;

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

Route::get("/forgot-password", [ForgotPasswordController::class, "ForgotPassword"])->name("forgot-password");
Route::post("/forgot-password", [ForgotPasswordController::class, "ForgotPasswordPost"])->name("forgot-password.post");
Route::get("/reset-password/{token}", [ForgotPasswordController::class, "ResetPassword"])->name("reset.password");
