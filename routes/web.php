<?php

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
    return view('welcome');
});

Route::any("/timeslot", "App\Http\Controllers\TimeSlotController@index");

Route::get('/displayTimeSlot', "App\Http\Controllers\TimeSlotController@displayTimeSlot");

Route::post("/bookTimeSlot", "App\Http\Controllers\TimeSlotController@bookTimeSlot");