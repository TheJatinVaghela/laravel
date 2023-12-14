<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CRUDuser extends Model
{
    use HasFactory;
    public $table = 'crudusers';

    public function show_crudUsers(){
        $crudusers = DB::table('crudusers')->get();
    }
}
