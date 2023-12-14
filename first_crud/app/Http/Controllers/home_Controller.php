<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home_Controller extends Controller
{
    public function __construct(){

    }

    public function showHome(){
        return view('home_view');
    }
}
