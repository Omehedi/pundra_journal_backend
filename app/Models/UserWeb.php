<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserWeb extends Authenticatable
{
    use HasFactory;

    protected $table = 'user_web';

    protected $fillable = [
        'name', 'email', 'password','phone'
    ];
}
