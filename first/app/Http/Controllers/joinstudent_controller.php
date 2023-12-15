<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class joinstudent_controller extends Controller
{
    public function showjoinstudent(){
        //join() = inner join
        $data = DB::table('joinstudents')
                ->select('joinstudents.*','joincitys.cityname')
                ->join('joincitys','joinstudents.c_id','=','joincitys.id')
                ->orderBy('joinstudents.name')
                ->cursorPaginate(5);
        // dump($data[0]);
        return view('joinstudent_view',['data'=>$data]);
    }
}
