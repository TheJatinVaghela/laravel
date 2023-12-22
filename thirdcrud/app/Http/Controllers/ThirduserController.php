<?php

namespace App\Http\Controllers;

use App\Models\thirduser;
use App\Http\Requests\StorethirduserRequest;
use App\Http\Requests\UpdatethirduserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThirduserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowUserView()
    {
        $users = DB::table('thirdusers')->get();
        return view('showusers',['data' => $users]);
    }

    public function DeleteUser($id){
        $delete = DB::table('thirdusers')->where('id',$id)->delete();
        return redirect()->route('showuser');
    }

    public function EditUser($data){
        $user = DB::table('thirdusers')->where('id',$data)->get();
        return view('edituserView',['data' => $user]);
    }
    public function SaveUpdatedUser(Request $data){
        $user = DB::table('thirdusers')->where('id',$data->id)->update(
            [
                 'updated_at' =>now(),
                 'username' => $data->username,
                 'useremail'=>$data->useremail,
                 'userpassword'=>$data->userpassword
            ]
        );
        return redirect()->route('showuser');
    }
    public function AddUser(Request $data){
        $adduser = DB::table('thirdusers')->insert(
            [
                'created_at' =>now(),
                'username' => $data->username,
                'useremail'=>$data->useremail,
                'userpassword'=>$data->userpassword
           ]
            );
        return redirect()->route('showuser');
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
    public function store(StorethirduserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(thirduser $thirduser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(thirduser $thirduser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatethirduserRequest $request, thirduser $thirduser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(thirduser $thirduser)
    {
        //
    }
}
