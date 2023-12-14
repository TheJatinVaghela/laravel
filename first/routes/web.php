<?php

use App\Http\Controllers\CRUDuser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firstController; // NOT app Use App
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
});

//  Route::get('/anotherName',function(){
//   return view('post');
//  });

// Route::view('/post','post');

Route::get('/anotherName/{postPage?}',function(int $postPage = 10){
    if($postPage){
        return view('post',
        [
        "postPage"=>$postPage,
        "script"=>'<script>alert("HELLOW");</script>',
        "empty"=>""
        ]);
    }else{
        return view('post');
    }
   })->whereNumber('postPage')->name("home")
   ;

Route::get('/controller',[firstController::class,'showUser'])->name("postPage");
Route::get('/controller/{id}',[firstController::class,'showuserId'])->name("IdPage");


// Route::get('/crudusers',[CRUDuser::class,'show_crudUsers'])->name("crudusers");
// Route::get('/crudusers/{id}',[CRUDuser::class,'show_single_user'])->name('crudusers_singleUser');
// Route::get('/insertuser',[CRUDuser::class,'add_cruduser'])->name("insert_crudusers");
// Route::get("/updatecruduser/{id}",[CRUDuser::class,'update_cruduser'])->name("update_crudusers");
// Route::get('/alldeletecruduser',[CRUDuser::class,'all_delete_cruduser'])->name("all_delete_crudusers");
// Route::get('/deletecruduser/{id}',[CRUDuser::class,'delete_cruduser'])->name("delete_crudusers");

// // add user with form
// Route::view('/add_cruduser','addcrudUser')->name("add_cruduser");
// Route::post('addcruduser',[CRUDuser::class,'add_new_cruduser'])->name('submit_addNewcruduser');

// //update user with form
// Route::get('/update_crudUser/{$data}','form_updateCrudUser')->name("update_CRUDuser");
// Route::post('form_updateCrudUser',[CRUDuser::class,'update_crud_user'])->name('form_update_cruduser');

// or use Group

Route::controller(CRUDuser::class)->group(function(){
    Route::get('/crudusers','show_crudUsers')->name("crudusers");
    Route::get('/crudusers/{id}','show_single_user')->name('crudusers_singleUser');
    Route::get('/insertuser','add_cruduser')->name("insert_crudusers");
    Route::get("/updatecruduser/{id}",'update_cruduser')->name("update_crudusers");
    Route::get('/alldeletecruduser','all_delete_cruduser')->name("all_delete_crudusers");
    Route::get('/deletecruduser/{id}','delete_cruduser')->name("delete_crudusers");


    //update user with form
    Route::get('/from_update_crudUser/{id}','showform_updateCrudUser')->name("fromupdate_crudUser");
    Route::put('form_updateCrudUser','update_crud_user')->name('form_update_cruduser');
});
// add user with form
Route::view('/add_cruduser','addcrudUser')->name("add_cruduser");
Route::post('addcruduser',[CRUDuser::class,'add_new_cruduser'])->name('submit_addNewcruduser');
