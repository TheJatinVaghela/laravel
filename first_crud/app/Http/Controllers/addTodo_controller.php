<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addTodo_controller extends Controller
{
    public function showAddTodo(Request $data){

        $addUser = DB::table('users')->insert(
            [
                "userName"=>$data->userName,
                "userEmail"=>$data->userEmail,
            ]
        );
        if($addUser){

            return view('addTodo_view');
        }else{
            return redirect()->route('/');
        }
    }
}
