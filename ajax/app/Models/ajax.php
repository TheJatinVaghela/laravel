<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ajax extends Model
{
    use HasFactory;
    public $table = "ajaxes";
    protected $fillable = [
        'name',
        'email',
    ];
}
