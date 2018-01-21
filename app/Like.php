<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Like extends Model
{
    protected $table = "likes";

    protected $fillable = [
        'user_id','post_id','like_type_id'
    ];
    protected $hidden = [
        'status','created_at', 'updated_at'
    ];


}
