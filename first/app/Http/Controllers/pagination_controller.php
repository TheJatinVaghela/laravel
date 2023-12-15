<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pagination_controller extends Controller
{
    public function show_pagination(){
        // $get_data = DB::table('paginations')->simplePaginate(5);
        // $get_data = DB::table('paginations')->paginate(5);
        // $get_data = DB::table('paginations')->orderBy('id')->cursorPaginate(5);
        // $get_data = DB::table('paginations')->where('id','>=',10)->orderBy('id')->cursorPaginate(5);
        //  $get_data = DB::table('paginations')->where('id','<=',20)->paginate(5,['*'],'p');
         $get_data = DB::table('paginations')->where('id','<=',20)->paginate(5,['*'],'p')
                                                                  ->appends(['sort'=>'votes'])
                                                                  ->fragment('users');
        // $get_data = DB::table('paginations')->orderBy('name')->cursorPaginate(5);
        //  $get_data = DB::table('paginations')->orderBy('email')->cursorPaginate(5);
        //  $get_data = DB::table('paginations')->orderBy('created_at')->cursorPaginate(5);
        if($get_data){
            return view('pagination_view',['data'=>$get_data]);
        }else{
            echo "<a class='btn btn-danger' href=".route('/').">try again</a>";
        }
    }
}
