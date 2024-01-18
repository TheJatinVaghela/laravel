<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userLogin (Request $request):Response{
        $input = $request->all();

        if(Auth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ])){

            $user = Auth::user();
            $token = $user->createToken('My Token')->accessToken;
             dd($token);
            return Response(['status'=>200,'token'=>$token],200);
        }else{
            return Response(['status'=>500,'failer'=>'failer'],500);
        }
    }
    public function userLogOut (){

    }
    /**
     * Display a listing of the resource.
     */
    public function index ():Response{
        $user = Auth::guard('api')->user();
        return Response(['data'=>$user],200);
    }
}
