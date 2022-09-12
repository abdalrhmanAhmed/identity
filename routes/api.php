<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', [App\Http\Controllers\Api\Accounts\CredibilityController::class, 'register']);


// Route::middleware('auth:api')->group(function(){
//     // route to get fees type from student_payments
//     // Route::post('getfees', [App\Http\Controllers\Banks\Functions\StudentController::class, 'getfeestype']);
//     // route to get data from student_payments
//     Route::post('info', [App\Http\Controllers\Banks\Functions\NewController::class, 'getstudentinfo']);
//     // route to put data in payments
//     Route::post('pay', [App\Http\Controllers\Banks\Functions\NewController::class, 'payapi']);
//     // route to revers data in payments and make status of student  =  -1
//     Route::post('revers', [App\Http\Controllers\Banks\Functions\NewController::class, 'retreat']);

// });
