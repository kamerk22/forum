<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $fillable = [
        'user_id','post_id','comment'
    ];
    protected $hidden = [
        'status','created_at', 'updated_at'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
