<?php

use App\Http\Controllers\sign_in_Controller;
use App\Http\Controllers\todo_Controller;
use Illuminate\Support\Facades\Route;

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

Route::view('/','sign_in_view')->name('sign_in');
Route::post('/add_User',[sign_in_Controller::class,'addUser'])->name('addUser');
Route::post('/chackUser',[sign_in_Controller::class,'chackUser'])->name('chackUser');
Route::get('/todo/{id}',[todo_Controller::class,'showtodo'])->name('todo');
Route::post('/addTodo',[todo_Controller::class,'addtodo'])->name('addTodo');
Route::post('/updateTodo_',[todo_Controller::class,'showupdateTodo'])->name('showupdateTodo');
Route::put('/yesUpdateTodo',[todo_Controller::class,'yesUpdateTodo'])->name('yesUpdateTodo');
Route::delete('/deleteTodo',[todo_Controller::class,'deleteTodo'])->name('deleteTodo');
