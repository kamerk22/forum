<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeType extends Model
{
    protected $table = "like_type";

    protected $fillable = [
        'like_type','icon'
    ];
    protected $hidden = [
        'status','created_at', 'updated_at'
    ];
}
