<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index']);
Route::get('/about', [MainController::class, 'about']);
Route::get('/login', [MainController::class, 'login']);
Route::get('/register', [MainController::class, 'register']);
Route::post('/register', [MainController::class, 'register']);
Route::get('/dashboard', [Dashboard::class, 'index']);
Route::match(['get', 'post'],'/post-ad', [Dashboard::class, 'postAdCategpryPick']);
Route::get('/post-ad/{id}', [Dashboard::class, 'postAd']);


/*Route::get('/', function () {
    return view('welcome');
});*/
