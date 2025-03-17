<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

//TODO: Sabit bir sayfaya link ekle(mesela yardım)
Route::resource('categories', CategoryController::class);
Route::resource('tasks', TaskController::class);
Route::resource('/', TaskController::class);

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('login');

Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/help', 'help')->name('help');


//Sadece kullanıcı giriş yapmış ise fonksiyon çalışır.
Route::middleware('auth')->get('/user', function () {
    $user = Auth::user();//Artık buradan kesin veri dönüyor.$user null olmayacak.
   
    return $user;
}


);