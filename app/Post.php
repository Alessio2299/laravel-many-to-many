<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'url', 'description', 'slug', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}