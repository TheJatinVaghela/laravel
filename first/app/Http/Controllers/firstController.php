<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstController extends Controller
{
    public function __construct(){

    }

    public function showUser(){
        return view('showUser');
    }

    public function showuserId($id){
        return view("userId",["id"=>$id]);
    }
}
