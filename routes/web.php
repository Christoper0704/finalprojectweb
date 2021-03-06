<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RestaurantProfile;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inputdata', function () { 
    return view('inputdata');
});

Route::get('/updateprofile/{id}', [App\Http\Controllers\UpdateDataController::class, 'index'])->name('updateprofile');

Route::get('/login', function () { 
    return view('login');
});

Route::get('add-data',[InputController::class,'create'])->name('add-data');
Route::post('add-data',[InputController::class,'store'])->name('add-data');

Route::post('update-data',[App\Http\Controllers\UpdateDataController::class,'update'])->name('update-data');

Route::post('upload', [App\Http\Controllers\UploadController::class,'proses_upload'])->name('upload');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

// Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');

Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);

// Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::get('/profilerestaurant',[App\Http\Controllers\RestaurantProfileController::class, 'show'])->name('profilerestaurant');

Route::get('/booking',[App\Http\Controllers\BookingController::class, 'show'])->name('booking');

Route::get('/accept/{id}', [App\Http\Controllers\BookingController::class, 'accept'])->name('accept');
Route::get('/cancel/{id}', [App\Http\Controllers\BookingController::class, 'cancel'])->name('cancel');
Route::get('/finish/{id}', [App\Http\Controllers\BookingController::class, 'finish'])->name('finish');