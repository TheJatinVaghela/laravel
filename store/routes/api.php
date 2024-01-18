<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\SellerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//for helper's
/*
1. Create HelerFoler And File ex.helper.php
2.php artisan config:Cache ( 2 - 3 times)
3. composer dump-autoload
4. php artisan serve
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(SellerController::class)->group(function (){
    // Url = 'http://127.0.0.1:8000/api/get=allusers' (/api) has to be there on url
    Route::get('get=allusers','index');

});

//Passport
Route::controller(UserController::class)->group(function (){
    Route::post('/login','userLogin')->name('addUser_api');
});
Route::controller(UserController::class)->group(function (){
    Route::get('/user','index')->name('showUser_api');
    Route::get('/logOut','userLogOut')->name('logOut_api');
})->middleware('auth:api');
