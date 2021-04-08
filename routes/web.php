<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::middleware('auth:api')->group(function(){
    Route::get('user',[UserController::class,'details'])->name('user');
    //Route::resource('welcome', 'WelcomeController');
});

Route::get('login',function(){
    return view('auth.login');
})->name('login');

Route::post('user',[UserController::class,'login']);

Route::get('register',function(){
    return view('auth.register');
})->name('register');
Route::post('register', [UserController::class,'register']);
