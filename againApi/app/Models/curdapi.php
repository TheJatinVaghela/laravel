<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class curdapi extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'curdapis';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password' ,
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'password' =>'hashed'
    ];
}
