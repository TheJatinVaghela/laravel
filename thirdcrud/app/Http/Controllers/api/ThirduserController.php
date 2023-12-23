<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\thirduser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ThirduserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = thirduser::all();

        } catch (\Exception $th) {
            return response()->json(["data"=>null,"message"=>$th->getMessage(),"status"=>500]);
        }
        return response()->json(["data"=>$user,"message"=>'Done',"status"=>200]);

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
        try {
            $validate = $request->validate(
                [
                    "username"=>"required|max:200",
                    "useremail"=>"required|email|unique:thirdusers,useremail",
                    "userpassword"=>"required",
                    "created_at"=>now()
                ]
            );
        } catch (\Exception $th) {
            return response()->json(["data"=>null,"message"=>$th->getMessage(),"status"=>400]);
        }

        DB::beginTransaction();
        // $this->p($validate);
        $data = [
            "username"=> $request->username,
            "useremail"=> $request->useremail,
            "userpassword"=> Hash::make($request->userpassword)
        ];
        try {
            $user = thirduser::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $user = null;
            return response()->json(["data"=>null,"message"=>$th->getMessage(),"status"=>500]);
        }

        return response()->json(["data"=>"succses","message"=>'Done',"status"=>200]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function p($stuf){
        echo"<pre>";
        print_r($stuf);
        echo"</pre>";
    }
}
