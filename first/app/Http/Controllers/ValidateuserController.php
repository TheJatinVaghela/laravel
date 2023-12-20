<?php

namespace App\Http\Controllers;

use App\Models\validateuser;
use App\Http\Requests\StorevalidateuserRequest;
use App\Http\Requests\UpdatevalidateuserRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class ValidateuserController extends Controller
{
    public function showuser(){
        $allusers = DB::table('validateusers')->get();
        return view('validateuser',['data'=>$allusers]);
    }
    public function adduser(Request $info){

    }
    public function updateuser(Request $info){

    }
    public function deleteuser(Request $info){

    }
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
    public function store(StorevalidateuserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(validateuser $validateuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(validateuser $validateuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatevalidateuserRequest $request, validateuser $validateuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(validateuser $validateuser)
    {
        //
    }
}
