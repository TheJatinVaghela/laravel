<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class todo_Controller extends Controller
{
    public function showtodo($id){
        $getUser = DB::table('users')->where('id','=',$id)
                    ->get();
        $getTodos = DB::table('todos')->where('user_id','=',json_decode($getUser)[0]->id)
                    ->get();
        if($getUser){
            return view('todo_view',['user'=>$getUser,'todos'=>$getTodos]);
        }
    }

    public function addtodo(request $data){
        $user_info = json_decode($data->user_Id)[0];
        $todo_info = $data->todo;

        $addtodo = DB::table('todos')->insert(
            [
                'created_at'=>now(),
                'updated_at'=>now(),
                'user_id'=>$user_info->id,
                'todo'=>$todo_info
            ]
            );
            if($addtodo){

                return redirect()->route('todo',$user_info->id);
            }
    }

    public function showupdateTodo(Request $data){
        return view('updatetodo_view',['data'=>$data]);
    }
    public function yesUpdateTodo(Request $data){
        $updateTodo = DB::table('todos')->where('id','=',$data->todo_id)
                      ->update(
                        [
                            'todo'=> $data->todo
                        ]
                      );
        if($updateTodo){
            return redirect()->route('todo',$data->user_id);
        }else{
            echo '<a href="{{route("todos",'.$data->user_id.')}}">Error CLICK to GO BACK and try AGAIN</a>';
        }
    }
    public function deleteTodo(Request $data){
        $deletetodo = DB::table('todos')->where('id','=',$data->todo_id)->delete();
        if($deletetodo){
            return redirect()->route('todo',$data->user_id);
        }else{
            echo '<a href="{{route("todos",'.$data->user_id.')}}">Error CLICK to GO BACK and try AGAIN</a>';
        }
    }
}
