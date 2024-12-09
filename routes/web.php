<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;

/*Route::get('/', function () {
    return view('welcome');
});*/

//TODO: Sabit bir sayfaya link ekle(mesela yardım)
Route::resource('categories', CategoryController::class);
Route::resource('tasks', TaskController::class);

Route::resource('/', TaskController::class);

Route::get('/help', function () {
    return view('help');
});

