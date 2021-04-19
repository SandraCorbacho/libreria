<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\AuthorController;


Route::get('/', [WelcomeController::class,'index'])->name('welcome');
Route::middleware('auth:api')->group(function(){
    Route::get('user',[UserController::class,'details'])->name('user');
    //Route::resource('welcome', 'WelcomeController');
});
///Backoffice
Route::prefix('admin')->middleware('role')->group(function () {

    Route::get('home',function(){
        return view('admin.home');
    });
    Route::get('/', [WelcomeController::class,'admin'])->name('admin');
    Route::get('/products',[BookController::class, 'index'])->name('book.index');
    Route::get('/products/create',[BookController::class, 'create'])->name('book.create');
    Route::post('/products/create',[BookController::class, 'store'])->name('book.store');
    Route::get('/products/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
    Route::post('/products/edit/{id}',[BookController::class, 'update'])->name('book.update');


   
    Route::get('/categories',[CategorieController::class, 'index'])->name('categories.index');
    Route::get('/categories/create',[CategorieController::class, 'create'])->name('categories.create');
    Route::post('/categories/create',[CategorieController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}',[CategorieController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/edit/{id}',[CategorieController::class, 'update'])->name('categories.update');

    Route::get('/author',[AuthorController::class, 'index'])->name('author.index');
    Route::get('/author/create',[AuthorController::class, 'create'])->name('author.create');
    Route::post('/author/create',[AuthorController::class, 'store'])->name('author.store');
    Route::get('/author/edit/{id}',[AuthorController::class, 'edit'])->name('author.edit');
    Route::post('/author/edit/{id}',[AuthorController::class, 'update'])->name('author.update');
});


Route::get('login',function(){
    return view('auth.login');
})->name('login');

Route::post('user',[UserController::class,'login']);
Route::get('logout',[UserController::class,'logout'])->name('logout');

Route::get('register',function(){
    return view('auth.register');
})->name('register');
Route::post('register', [UserController::class,'register']);

Route::get('profile',function(){
    return view('auth.profile');
})->name('profile');


Route::get('/author/{id}',[WelcomeController::class,'author'])->name('author.detail');