<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;

//TODO: Sabit bir sayfaya link ekle(mesela yardım)
Route::resource('categories', CategoryController::class);
Route::resource('tasks', TaskController::class);
Route::resource('/', TaskController::class);


// Route::get('/help', function () {
//     return view('help');
// });

Route::view('/help', 'help')->name('help');

