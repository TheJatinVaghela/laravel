<?php

use App\Http\Controllers\ThirduserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::controller(ThirduserController::class)->group(function(){

        Route::get('/showuser','ShowUserView')->name('showuser');
        Route::get('/deleteuser/{id}','DeleteUser')->name('deleteuser');
        Route::get('/edituser/{id}','EditUser')->name('edituser');
        Route::put('/saveupdateduser','SaveUpdatedUser')->name('saveupdateduser');
        Route::view('/adduserform','addUserView')->name('adduserform');
        Route::post('/adduser','AddUser')->name('adduser');
}
);
