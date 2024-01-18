<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class api extends Model
{
    use HasFactory;

    public $table = 'apis';

    protected $fillable=[
        "name",
        "email",
        "password"
    ];

    protected $hidden = [
        "password"
    ];
}
