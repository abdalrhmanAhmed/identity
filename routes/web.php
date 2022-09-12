<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use LaravelQRCode\Facades\QRCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('qr-code/examples/text', function () 
// {
//     return  QRCode::text('Laravel QR Code Generator!')->png();   
// });  
 
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{page}', [App\Http\Controllers\AdminController::class , 'index']);
