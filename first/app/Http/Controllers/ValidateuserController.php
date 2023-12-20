<?php

namespace App\Http\Controllers;

use App\Models\validateuser;
use App\Http\Requests\StorevalidateuserRequest;
use App\Http\Requests\UpdatevalidateuserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidateuserController extends Controller
{
    public function showuser(){
        $allusers = DB::table('validateusers')->get();
        return view('validateuser',['data'=>$allusers]);
    }
    public function getuser($id){
        $user = DB::table('validateusers')->where('id',$id)->get();
        return $user;
    }
    public function showform($page,$id = null){

        switch ($page) {
            case 'add':
                if($id === 'NULL'){
                return view('validate_form',['page'=>$page]);
                }
                break;
            case 'update':
                if($id !== null){
                    $user = $this->getuser($id);
                    return view('validate_form',['page'=>$page, 'data'=>$user]);
                }
                break;
            case 'delete':
                if($id !== null){
                    $user = $this->getuser($id);
                    return view('validate_form',['page'=>$page, 'data'=>$user]);
                }
                break;

            default:
                return redirect()->route('/');
                break;
        }
    }
    public function adduser(Request $info){
        $info->validate(
            [
                'username'=>'required',
                'useremail'=>'required|email',
                'usercity'=>'required',
                'userage'=>'required|integer'
            ]
        );
         $adduser = DB::table('validateusers')->insertGetId(
             [
                 'created_at'=>now(),
                 'username'=>$info->username,
                 'useremail'=>$info->useremail,
                 'usercity'=>$info->usercity,
                 'userage'=>$info->userage
             ]
         );

         if($adduser !== null){
            return redirect()->route('validateuser');
         }
    }
    public function updateuser(Request $info){
        $updateuser = DB::table('validateusers')->where('id','=',$info->user_id)->update(
            [
                'updated_at'=>now(),
                'username'=>$info->username,
                'useremail'=>$info->useremail,
                'usercity'=>$info->usercity,
                'userage'=>$info->userage
            ]
        );

        return redirect()->route('validateuser');

    }
    public function deleteuser(Request $info){
        // dd($info->user_id);
        $deleteuser = DB::table('validateusers')->where('id',$info->user_id)->delete();
        return redirect()->route('validateuser');
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
