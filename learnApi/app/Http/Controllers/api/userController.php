<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = User::all();
        } catch (\Exception $th) {
            //throw $th;
            return response()->json(["message"=>$th->getMessage(),"status"=>500]);
        }
        return response()->json(["data"=>$user,"status"=>200]);
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
    public function store(Request $request)
    {
        // p($request->all());
        try {
            $request->validate(
                [
                    "name"=>"required|max:200",
                    "email"=>"required|max:200|email|unique:users,email",
                    "password"=>"required|max:200|min:8|confirmed",
                    "password_confirmation"=>"required"
                ]
            );

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(),400);
            //throw $th;
        }

        // p($request->all());
        DB::beginTransaction(); //Start transaction here
        $data = [
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ];
        try {
            // return response()->json($data);
            $user = User::create($data);  //Added this

            DB::commit(); // commit the transaction AT END
        } catch (\Exception $th) {
            //throw $th;
            DB::rollBack(); //If any warning or error rollback all quiry
            p($th->getMessage());
            $user = NULL;
            // return response()->json($th->getMessage(),400);
        }
        if($user === NULL){
            //Not Stored
            return response()->json(["message"=>"There Was An Error","status"=>500]); // evrything succsesfull then return
        }else{
            //Stored
            return response()->json(["message"=>"User Added Sucssecfully","status"=>200]); // evrything succsesfull then return
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = User::find($id);
         } catch (\Throwable $th) {
             return response()->json(["data"=>null,"message"=>$th->getMessage(),"status"=>500]);
         }
         return response()->json(["data"=>$data,"message"=>'Done',"status"=>200]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // in update on postman use x-www-form-unlencoded not for-data
       $chackuser = User::find($id);
       if($chackuser == NULL){
           return response()->json(["data"=>NULL,"message"=>"user not found","status"=>400]);
       };
       DB::beginTransaction();
       try {
           // User::find($id)->name = $request->name // OR
           $chackuser->name =  $request["name"];
           $chackuser->email =  $request["email"];
           $chackuser->save();
           DB::commit();
           $chackuser = User::find($id);
       } catch (\Exception $th) {
           DB::rollBack();
           $chackuser = NULL;
           return response()->json(["data"=>null,"message"=>$th->getMessage(),"status"=>500]);
       }
       return response()->json(["data"=>$chackuser,"message"=>'Done',"status"=>200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chackuser = User::find($id);
        if($chackuser == NULL) {
            return response()->json(["data"=>NULL,"message"=>"user not found","status"=>400]);
        };
        try {
            DB::beginTransaction();
            User::find($id)->delete();
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json(["data"=>null,"message"=>$th->getMessage(),"status"=>500]);
        }

        return response()->json(["data"=>"succsess","message"=>'Done',"status"=>200]);
    }
}
