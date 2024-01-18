<?php

namespace App\Http\Controllers;

use App\Models\ajax;
use App\Http\Requests\StoreajaxRequest;
use App\Http\Requests\UpdateajaxRequest;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreajaxRequest $request , ajax $ajax)
    {
        try {
            DB::beginTransaction();
            $data = [
                "name"=>$request->name,
                "email"=>$request->email,
            ];
            $ajax::create($data);
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            $data = NULL;
            return response()->json(["data"=>NULL, "error"=>$th->getMessage(),"status"=>500]);
        };
        try {
            $user = $ajax->where("email","=",$request->email)->get();
        } catch (\Exception $th) {
            $user = NULL;
            return response()->json(["data"=>NULL, "error"=>$th->getMessage(),"status"=>500]);
        };
        return response()->json(["data"=>$user, "error"=>"success","status"=>200]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ajax $ajax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ajax $ajax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateajaxRequest $request, ajax $ajax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ajax $ajax)
    {
        //
    }
}
