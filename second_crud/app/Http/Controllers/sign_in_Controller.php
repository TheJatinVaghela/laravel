<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sign_in_Controller extends Controller
{
    public function chackUser(request $data){
        $chackuser = DB::table('users')->where('userEmail','=',$data->userEmail)->get();
        //  dd($chackuser[0]->id);
        $user_id = $chackuser[0]->id;
        if($chackuser){
            return redirect()->route('todo',$user_id);
        }else{
            echo '<a href="{{route("/")}}">Error CLICK to GO BACK and try AGAIN</a>';
        }
    }
    public function addUser(Request $data){
        // dd($data->userName);
        $addUser = DB::table('users')->insertGetId(
                    [
                        "userName"=>$data->userName,
                        "userEmail"=>$data->userEmail,
                        'created_at'=>now(),
                        'updated_at'=>now()
                    ]
        );
        if($addUser){

            return redirect()->route('todo',$addUser);
        }else{
            echo '<a href="{{route("/")}}">Error CLICK to GO BACK and try AGAIN</a>';
        }
    }
}
