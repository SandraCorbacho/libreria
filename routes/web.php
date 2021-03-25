<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
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
Route::middleware('auth:api')->group(function(){
    Route::get('user',[UserController::class,'details']);
    Route::resource('welcome', WelcomeController::class);
});

Route::post('login',[UserController::class,'login']);
Route::post('register', [UserController::class,'register']);
