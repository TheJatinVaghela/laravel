<?php

namespace App\Http\Controllers;

use App\Models\curdapi;
use App\Http\Requests\StorecurdapiRequest;
use App\Http\Requests\UpdatecurdapiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CurdapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = curdapi::all();
        } catch (\Exception $th) {
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        return response()->json(['data'=>$user,'message'=>'Done','status'=>200]);
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
    public function store(StorecurdapiRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ];
            curdapi::create($data);
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            $data = NULL;
            $user = NULL;
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        try {
            $user = curdapi::where('email', $request->email)->get();
        } catch (\Exception $th) {
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        return response()->json(['data'=>$user,'message'=>'Done','status'=>200]);
    }

    /**
     * Display the specified resource.
     */
    public function show(curdapi $curdapi , $id)
    {
        try {
            $user = curdapi::find($id);
        } catch (\Exception $th) {
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        return response()->json(['data'=>$user,'message'=>'Done','status'=>200]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(curdapi $curdapi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecurdapiRequest $request,curdapi $curdapi, $id)
    {
        try {
            $user = $curdapi::find($id);
        } catch (\Exception $th) {
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        try {

            DB::beginTransaction();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        try {
            $user = curdapi::where('email', $request->email)->get();
        } catch (\Exception $th) {
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        return response()->json(['data'=>$user,'message'=>'Done','status'=>200]);
    }
  /**
   * Update User Password
   */
    public function updatePassword(Request $request,curdapi $user , $id){
        try {
            $user = $user::find($id);
        } catch (\Exception $th) {
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        if(!(Hash::check($request['old_password'],$user->password))){
            return response()->json(["data"=>$request->old_password. '='.$user->password ,"message"=>"Old Password Does Not Match","status"=>400]);
        };
        if($request['new_password'] != $request['password_confirmation']){
        return response()->json(["data"=>NULL,"message"=>"new Password Does Not Match With Confirm Password","status"=>400]);
        };
        try {
            DB::beginTransaction();
            $user->password = bcrypt($request["new_password"]);
            $user->save();
            DB::commit();
            $user = curdapi::find($user->id);
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
       return response()->json(["data"=>$user,"message"=>'Done',"status"=>200]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(curdapi $user,$id)
    {
        try {
            $user = $user::find($id);
        } catch (\Exception $th) {
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(['data'=>NULL,'message'=>$th->getMessage(),'status'=>500]);
        }
        return response()->json(["data"=>"succsess","message"=>'Done',"status"=>200]);
    }
}
