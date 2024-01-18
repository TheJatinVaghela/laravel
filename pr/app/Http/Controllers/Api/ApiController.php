<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\api;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = api::all();
        } catch (\Exception $th) {
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        }
        return response()->json(['data'=>$user,'message'=>'succses','status'=>'200']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request ,api $api)
    {
        try {
            DB::beginTransaction();
            $data = [
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Hash::make($request->password)
            ];
            $api::create($data);
            // $api->save();
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        };
        try {
            $user = $api::where("email","=",$data["email"])->get();
        } catch (\Exception $th) {
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        }
        return response()->json(['data'=>$user,'message'=>'succses','status'=>'200']);
    }

    /**
     * Display the specified resource.
     */
    public function show(api $api,$id)
    {
        try {
            $user = $api::find($id);
        } catch (\Exception $th) {
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        }
        return response()->json(['data'=>$user,'message'=>'succses','status'=>'200']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,api $api, $id)
    {
        try {
            $user = $api::find($id);
            // if we validate with confirme for password it will give error use if like below
            $data =  $request->validate([
                "old_password"=>"required",
                "new_password"=>"required",
                "password_confirmation"=>"required"
            ]);
        } catch (\Exception $th) {
            return response()->json(['data'=>[$request->new_password,$request->password_confirmation],'message'=>$th->getMessage(),'status'=>'500']);
        };
        if(!($chack = Hash::check($data['old_password'],$user->password))){
            return response()->json(['data'=>$chack,'message'=>"old password is wrong",'status'=>'500']);
        };
        if($request['new_password'] != $request['password_confirmation']){
            return response()->json(["data"=>NULL,"message"=>"new Password Does Not Match With Confirm Password","status"=>400]);
        };
        try {
            DB::beginTransaction();
            $user->password = bcrypt($data["new_password"]);
            $user->save();
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        }
        return response()->json(['data'=>$user,'message'=>'succses','status'=>'200']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,api $api,$id)
    {
        try {
            $user = $api::find($id);
        } catch (\Exception $th) {
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        };
        try {
            DB::beginTransaction();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        };
        try {
            $user = $api::find($id);
        } catch (\Exception $th) {
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        };
        return response()->json(['data'=>$user,'message'=>'succses','status'=>'200']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(api $api, $id)
    {
        try {
            $user = $api::find($id);
        } catch (\Exception $th) {
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        };
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['data'=>null,'message'=>$th->getMessage(),'status'=>'500']);
        }
        return response()->json(['data'=>$id." is deleted",'message'=>'succses','status'=>'200']);
    }
}
