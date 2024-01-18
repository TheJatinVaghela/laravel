<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    use HasFactory;

    protected $fillable = [
        's_name',
        's_email',
        's_password',
        's_address',
        's_country',
        's_phone'
    ];

    protected $hidden = [
        's_password'
    ];
}
