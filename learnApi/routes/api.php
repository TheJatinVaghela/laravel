<?php

use App\Http\Controllers\api\userController;
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

// Route::get('/user',function(){return response()->json('HELLOW WORLD');});
// Route::post('/user/{id}',function($id){return response()->json('HELLOW WORLD '.$id);});
// Route::delete('/user/{id}',function($id){return response('DELETE'.$id,200);});
// Route::put('/user/{id}',function($id){return response('PUT'.$id,200);});


// Route::get('/user',function(){ p('Working');});
Route::post('/user/store',[userController::class,'store']);
