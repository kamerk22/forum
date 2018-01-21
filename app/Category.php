<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    protected $fillable = [
        'parent_id','name','priority','slug'
    ];
    protected $hidden = [
        'status','created_at', 'updated_at'
    ];

    public function blog_count() {
        return $this->hasMany('App\Post');
    }

    public function getPostCountAttribute()
    {
        return $this->blog_count->count;
    }

}
