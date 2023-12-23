<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\thirduser as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class thirduser extends Model
{
    use HasFactory;

    protected $fillable = [
        "username",
        "useremail",
        "userpassword"
    ];
    protected $hidden = [
        'userpassword',
    ];

    protected $casts = [
        'userpassword' => 'hashed'
    ];
}
