<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'category_id'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function storage(){
        $cover_path = Storage::put('uploads', $data['image']);
    }
}
