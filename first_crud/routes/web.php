<?php

use App\Http\Controllers\addTodo_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\getTodo;
use App\Http\Controllers\home_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get("/",[homeController::class,'showHome'])->name('home');
// Route::post("/post",[getTodo::class,"showTodo"])->name('getTodo');

Route::get('/',[home_Controller::class,'showHome'])->name('home');
Route::post('/addTodo',[addTodo_controller::class,'showAddTodo'])->name('addTodo');
