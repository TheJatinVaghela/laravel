<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUDuser extends Controller
{
    public function show_crudUsers(){
          $crudusers = DB::table('crudusers')->get();
        //  $crudusers = DB::table('crudusers')->where("id","=","2")->get();
        //  $crudusers = DB::table('crudusers')->where("id","=",2)->get();
         //$crudusers = DB::table('crudusers')->where("id",2)->get();
        //  $crudusers = DB::table('crudusers')->select("city")->distinct()->get();
          //$crudusers = DB::table('crudusers')->pluck("city");
        //   $crudusers = DB::table('crudusers')->pluck("city","name"); // city is key and name is value
        //    $crudusers = DB::table('crudusers')->where([
        //                                             ["id",5],
        //                                             ["city","Mariahfurt"]
        //                                         ])->get();
        //$crudusers = DB::table('crudusers')->where("id","=",2)->orWhere("city","=","Mariahfurt")->get();
          //return $crudusers;
         //  return $crudusers; //this also work
        //  dd($crudusers); // print_r of laravel after the data is printed it will exit() and stop the process
        //  dump($crudusers);//print_r of laravel works like the same thing dose not exit()
         return view('CRUDuser',['crudusers' => $crudusers]);
    }

    public function show_single_user($id){
        $singleUser = DB::table('crudusers')->where("id","=",$id)->get();
        return view('CRUDsingleuser',['singleUser' => $singleUser]);
    }

    public function add_cruduser(){
        // $cruduser = DB::table('crudusers')
        // ->insert([
        //     "name"=>"First",
        //     "email"=>"first@example.com",
        //     "city"=>"firstCity",
        //     "created_at"=>now(),
        //     "updated_at"=>now()
        // ]); //retruns True or false

        //multidimensional array
        // $cruduser = DB::table('crudusers')
        // ->insert([
        //     [
        //         "name"=>"First",
        //         "email"=>"alice24@reichel.com",
        //         "city"=>"firstCity",
        //         "created_at"=>now(),
        //         "updated_at"=>now()
        //     ],
        //     [
        //         "name"=>"second",
        //         "email"=>"second@example.com",
        //         "city"=>"secondCity",
        //         "created_at"=>now(),
        //         "updated_at"=>now()
        //     ]
        // ]); //retruns True or false

        //upsert chacks the uniq value and if it exists Insert new records or update the existing ones.
        //$cruduser = DB::table('crudusers')->upsert(
        //    [
        //        "name"=>"NewFirst",
        //        "email"=>"First@wolf.info",
        //        "city"=>"NewfirstCity",
        //        "created_at"=>now(),
        //        "updated_at"=>now()
        //    ],
        //    ['email']
        //);

        //insertGetId adds the value and retruns its id
        //$cruduser = DB::table('crudusers')->insertGetId(
        //    [
        //        "name"=>"NewFirst",
        //        "email"=>"First@wolf.info",
        //        "city"=>"NewfirstCity",
        //        "created_at"=>now(),
        //        "updated_at"=>now()
        //    ],
        //    ['email']
        //);
        //return $cruduser;
        // if any uniqe value is present and user trys the same it will ignore this
        $cruduser = DB::table('crudusers')
         ->insertOrIgnore([
                 "name"=>"First",
                 "email"=>"First@wolf.info",
                 "city"=>"firstCity",
                 "created_at"=>now(),
                 "updated_at"=>now()
                ]
            );
        if($cruduser){
            echo "<h1>Data Added </h1>";
            echo "<a class='btn btn-success' href=".route('crudusers').">see crud Users</a>";
        }else{
            echo "<h1>Email is already Present</h1>";
            echo "<a class='btn btn-danger'  href=".route('crudusers').">try again</a>";
        }
    }

    public function update_cruduser($id){
        //to update
        //$cruduser = DB::table('crudusers')->
        //            where('id',"=",$id)->
        //            update([
        //                'city'=>'mumbai',
        //                'name'=>'updated'
        //            ]);

        //in this updateOrInsert it will chack if the first array's key and value exist if yes then
        //update the value given in the second array if not present insert it in table
        //$cruduser= DB::table('crudusers')->
        //           where('id','=',$id)->
        //           updateOrInsert(
        //            [
        //                'city'=>'mumbai',
        //                'name'=>'anotherUpdateOrINsert',
        //                'email'=>'britchie@gmail.com',
        //                'city'=>'mumbai'
        //            ],
        //            ["name"=>"AgainAnotherUpdateOrINsert"]
        //        );

        //increment also u can decrement
        $cruduser= DB::table('crudusers')->where('id',$id)
                    ->increment('age') //increments age by 1
                    // ->decrement('age') //decrement age by 1
                    // ->increment('age',5) //increments age by 5
                    // ->decrement('age',5) //decrement age by 5
                    // ->decrement('age',5,['city'=>'delhi']) //decrement age by 5 and update city
                    //->incrementEach(['age'=>5 , 'votes'=>2]) //increments each key value
                    ;
        if($cruduser){
            echo "<h1>Data updated </h1>";
            echo "<a class='btn btn-success' href=".route('crudusers').">see crud Users</a>";
        }else{
            echo "<h1>404</h1>";
            echo "<a class='btn btn-danger'  href=".route('crudusers').">try again</a>";
        }
    }

    public function delete_cruduser($id){
        $cruduser = DB::table('crudusers')
                    ->where('id','=',$id)
                    ->delete();

        if($cruduser){
            echo "<h1>Data deleted </h1>";
            echo "<a class='btn btn-success' href=".route('crudusers').">see crud Users</a>";
        }else{
            echo "<h1>404</h1>";
            echo "<a class='btn btn-danger'  href=".route('crudusers').">try again</a>";
        }
    }

    public function all_delete_cruduser(){
        // $cruduser = DB::table('crudusers')->delete();
         $cruduser = DB::table('crudusers')->truncate();
        if($cruduser){
            return redirect()->route('crudusers');
        }else{
            // echo "<h1>404</h1>";
            // echo "<a class='btn btn-danger'  href=".route('crudusers').">try again</a>";
            return redirect()->route('crudusers');
        }
    }

    public function add_new_cruduser(Request $data){
        $cruduser=DB::table('crudusers')
                ->insert(
                    [
                        'name' => $data->user_name,
                        'email' => $data->user_email,
                        'city' => $data->user_city,
                        'age' => $data->user_age
                    ]
                );
        if($cruduser){
            echo "<h1>Data Added </h1>";
            echo "<a class='btn btn-success' href=".route('crudusers').">see crud Users</a>";
        }else{
            echo "<h1>Email is already Present</h1>";
            echo "<a class='btn btn-danger' href=".route('crudusers').">try again</a>";
        }
    }

    public function showform_updateCrudUser($data){
        $cruduser = DB::table('crudusers')->where('id',$data)->get();
        return view('form_updateCrudUser',['value'=>$cruduser[0]]);
    }
    public function update_crud_user(Request $data){

        $cruduser=DB::table('crudusers')
                  ->where('id',$data->user_id)
                  ->update(
                    [
                        "name" =>       $data->user_name,
                        "email" =>      $data->user_email,
                        "city"=>        $data->user_city,
                        "age"=>         $data->user_age,
                        "updated_at"=>  now()
                     ]
                    );
        if($cruduser){
            echo "<h1>Data Updated </h1>";
            echo "<a class='btn btn-success' href=".route('crudusers').">see Updated crud Users</a>";
        }else{
            echo "<h1>404</h1>";
            echo "<a class='btn btn-danger' href=".route('crudusers').">try again</a>";
        }
    }
}
