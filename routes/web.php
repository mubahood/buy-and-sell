<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'about']);


/*Route::get('/', function () {
    return view('welcome');
});*/
