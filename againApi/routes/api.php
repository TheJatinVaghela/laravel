<?php

use App\Http\Controllers\CurdapiController;
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

Route::controller(CurdapiController::class)->group(function (){

    Route::get('/crudapi/get','index'); // get all user
    Route::get('/curdapi/geta={id}','show'); // get one user
    Route::post('/curdapi/store','store'); // add one user
    Route::put('/curdapi/update={id}','update'); // update user name and email
    Route::patch('/curdapi/updatePassword={id}','updatePassword'); // update user password
    Route::delete('/curdapi/delete={id}','destroy');//delete one user
});
