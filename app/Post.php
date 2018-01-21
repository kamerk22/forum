<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = [
        'user_id','category_id','body','comment_count','like_count','upvote_count'
    ];
    protected $hidden = [
        'status','created_at', 'updated_at'
    ];
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function category() {
        return $this->hasOne('App\Category');
    }
    public function comments() {
        return $this->hasMany('App\Comment')->latest('id');
    }
    public function like() {
        return $this->hasMany('App\Like');
    }
    public function ownLike() {
        return $this->hasOne('App\Like');
    }

    public function upvotes() {
        return $this->hasMany('App\Upvote');
    }
    public function ownUpvote() {
        return $this->hasOne('App\Upvote');
    }
}
