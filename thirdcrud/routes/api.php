<?php

use App\Http\Controllers\api\ThirduserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ThirduserController::class)->group(function(){
    Route::get('/thirduser/get','index'); //show all thirduser
    Route::post('/thirduser/store','store');//store user
    Route::get('/thirduser/show/{id}','show');//show specified user
    Route::put('/thirduser/update/{id}','update');//update specified user
    Route::delete('/thirduser/delete/{id}','destroy');//delete specified user
});
