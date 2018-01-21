<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";

    protected $fillable = [
        'name','email'
    ];
    protected $hidden = [
        'password','remember_token','status','created_at', 'updated_at'
    ];

}
