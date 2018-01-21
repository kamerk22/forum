<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    protected $table = "upvotes";

    protected $fillable = [
        'user_id','post_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
