<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\Auth\UserAuthenticationController;
use App\Http\Controllers\ChallengeTwoController;
use App\Http\Controllers\EmployeeController;
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

Route::post('/login',[UserAuthenticationController::class,'login']);
Route::post('/register',[UserAuthenticationController::class,'Register']);
// Apply middleware for Authenticated users only
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/upload',[AttendenceController::class,'uploadAttendence']);
    Route::post('/challenge2/array',[ChallengeTwoController::class,'checkArray']);
    
    Route::get('/attendence/{attendence}',[AttendenceController::class,'getAttendence']);
    Route::get('/employees',[EmployeeController::class,'index']);
});

